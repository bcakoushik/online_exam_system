<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - MyExamSathi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: all 0.3s ease;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo h1 {
            color: #1a73e8;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }
        h2 {
            color: #1a73e8;
            font-weight: 700;
            text-align: center;
        }
        .alert-success, .alert-danger {
            border-radius: 6px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .otp-inputs {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            border: 1px solid #ced4da;
            border-radius: 6px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .otp-input:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 8px rgba(26, 115, 232, 0.2);
            outline: none;
        }
        .btn-primary {
            background-color: #1a73e8;
            border-color: #1a73e8;
            font-weight: 700;
            border-radius: 6px;
            padding: 10px 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #1557b0;
            border-color: #1557b0;
            transform: translateY(-2px);
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666666;
        }
        .footer a {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 700;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 576px) {
            .container {
                margin: 20px;
                padding: 20px;
            }
            .logo h1 {
                font-size: 24px;
            }
            h2 {
                font-size: 1.5rem;
            }
            .otp-input {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <h1>MyExamSathi</h1>
    </div>
    <h2 class="mb-4">Verify OTP</h2>

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <!-- OTP Form -->
    <form action="{{ url('verify-otp') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Enter 6-Digit OTP</label>
            <div class="otp-inputs">
                <input type="text" name="otp[]" class="otp-input" maxlength="1" required oninput="moveToNext(this, 'otp-2')">
                <input type="text" name="otp[]" class="otp-input" id="otp-2" maxlength="1" required oninput="moveToNext(this, 'otp-3')">
                <input type="text" name="otp[]" class="otp-input" id="otp-3" maxlength="1" required oninput="moveToNext(this, 'otp-4')">
                <input type="text" name="otp[]" class="otp-input" id="otp-4" maxlength="1" required oninput="moveToNext(this, 'otp-5')">
                <input type="text" name="otp[]" class="otp-input" id="otp-5" maxlength="1" required oninput="moveToNext(this, 'otp-6')">
                <input type="text" name="otp[]" class="otp-input" id="otp-6" maxlength="1" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Verify OTP</button>
    </form>

    <div class="footer">
        <p><a href="{{ url('register') }}">Back to Register</a> | <a href="{{ url('support') }}">Contact Support</a></p>
        <p>© {{ date('Y') }} MyExamSathi. All rights reserved.</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script>
    function moveToNext(current, nextFieldId) {
        if (current.value.length === 1 && nextFieldId) {
            document.getElementById(nextFieldId).focus();
        }
    }
    document.querySelectorAll('.otp-input').forEach(input => {
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !this.value && this.previousElementSibling) {
                this.previousElementSibling.focus();
            }
        });
    });
</script> --}}
</body>
</html>
