<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyExamSathi</title>
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
        .form-control {
            border-radius: 6px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 8px rgba(26, 115, 232, 0.2);
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
        .alert-danger {
            border-radius: 6px;
            background-color: #f8d7da;
            color: #721c24;
        }
        h2 {
            color: #1a73e8;
            font-weight: 700;
            text-align: center;
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
            h2 {
                font-size: 1.5rem;
            }
            .logo h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <h1>MyExamSathi</h1>
    </div>
    <h2 class="mb-4">Login</h2>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Login Form -->
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="footer">
        <p>Don't have an account? <a href="{{ url('register') }}">Register now</a></p>
        <p>&copy; {{ date('Y') }} MyExamSathi. All rights reserved.</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
