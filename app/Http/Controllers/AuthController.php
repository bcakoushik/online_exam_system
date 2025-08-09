<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    // Register Request handle
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,teacher,student',
        ]);

        // Generate 6-digit OTP
        $otp = rand(100000, 999999);

        // Save OTP and timestamp to session
        session([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5),
            'pending_user' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]
        ]);

        // Send OTP Email
        // $this->sendOtpEmail($request->email, $otp);
        $this->sendOtpEmail($request->email, $otp, $request->name);

        return redirect('/verify-otp')->with('success', 'OTP sent to your email.');


    }
    // Send otp to mail for verification
    private function sendOtpEmail($toEmail, $otp, $userName)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = config('mail.mailers.smtp.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
            $mail->Port = config('mail.mailers.smtp.port');

            // Recipients
            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mail->addAddress($toEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP for Registration';

            $year = date('Y');
            $supportUrl = url('support');
            $privacyUrl = url('privacy');

            $mail->Body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Your OTP for Registration</title>
        <style>
            body { margin: 0; padding: 0; font-family: 'Arial', sans-serif; background-color: #f4f4f9; }
            .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
            .header { background-color: #1a73e8; color: #ffffff; padding: 20px; text-align: center; }
            .header h1 { margin: 0; font-size: 24px; }
            .content { padding: 30px; color: #333333; line-height: 1.6; }
            .otp { font-size: 28px; font-weight: bold; color: #1a73e8; text-align: center; margin: 20px 0; padding: 15px; background-color: #e8f0fe; border-radius: 4px; }
            .content p { margin: 10px 0; }
            .footer { background-color: #f4f4f9; padding: 20px; text-align: center; font-size: 14px; color: #666666; }
            .footer a { color: #1a73e8; text-decoration: none; }
            @media only screen and (max-width: 600px) {
                .container { margin: 10px; }
                .header h1 { font-size: 20px; }
                .otp { font-size: 24px; }
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Your OTP for Registration</h1>
            </div>
            <div class='content'>
                <p>Dear $userName,</p>
                <p>Thank you for registering with us. To complete your registration, please use the following One-Time Password (OTP):</p>
                <div class='otp'>$otp</div>
                <p>This OTP is valid for <strong>5 minutes</strong>. Please do not share this code with anyone.</p>
                <p>If you did not initiate this request, please contact our support team immediately.</p>
                <p>Best regards,<br>Your Company Name</p>
            </div>
            <div class='footer'>
                <p>&copy; $year Your Company Name. All rights reserved.</p>
                <p><a href='$supportUrl'>Contact Support</a> | <a href='$privacyUrl'>Privacy Policy</a></p>
            </div>
        </div>
    </body>
    </html>
    ";

            $mail->send();
        } catch (\Exception $e) {
            info("OTP Email Error: " . $mail->ErrorInfo);
        }

    }
    // Show OTP In Blade
    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    // Verify The OTP
    public function verifyOtp(Request $request)
    {
        // Validate the otp array
        $request->validate([
            'otp' => 'required|array|size:6', // Ensure otp is an array with exactly 6 elements
            'otp.*' => 'required|digits:1',   // Each element must be a single digit
        ]);

        // Concatenate the otp array into a single string
        $otp = implode('', $request->input('otp'));

        // Check if OTP matches and is not expired
        if (
            session('otp') == $otp &&
            now()->lt(session('otp_expires_at'))
        ) {
            // OTP valid — create user and clear session
            $user = User::create(session('pending_user'));
            Auth::login($user);

            session()->forget(['otp', 'otp_expires_at', 'pending_user']);

            return redirect('/login')->with('success', 'Registration successful.');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
    // Login Page View
    public function showLogin()
    {
        return view('auth.login');
    }
    //Login Request Handle
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // ✅ Role-based redirection
            $role = Auth::user()->role;
            if ($role === 'admin')
                return redirect('/admin');
            if ($role === 'teacher')
                return redirect('/teacher');
            return redirect('/student');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
    // Logout the user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
    }

}
