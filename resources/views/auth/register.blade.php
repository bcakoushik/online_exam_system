<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .nav-tabs {
            border-bottom: 2px solid #1a73e8;
        }
        .nav-tabs .nav-link {
            color: #333333;
            font-weight: 700;
            transition: all 0.3s ease;
        }
        .nav-tabs .nav-link:hover {
            color: #1a73e8;
            background-color: #e8f0fe;
        }
        .nav-tabs .nav-link.active {
            color: #ffffff;
            background-color: #1a73e8;
            border-color: #1a73e8;
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
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Register</h2>
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
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs" id="roleTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="student-tab" data-bs-toggle="tab" data-bs-target="#student"
                    type="button" role="tab" aria-controls="student" aria-selected="true">Student</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="teacher-tab" data-bs-toggle="tab" data-bs-target="#teacher" type="button"
                    role="tab" aria-controls="teacher" aria-selected="false">Teacher</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button"
                    role="tab" aria-controls="admin" aria-selected="false">Admin</button>
            </li>
        </ul>
        <!-- Tab Content -->
        <div class="tab-content mt-4" id="roleTabContent">
            <!-- Student Form -->
            <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
                <form action="{{ url('register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="student">
                    <div class="mb-3">
                        <label for="student_name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="student_name"
                            value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="student_email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="student_email"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="student_password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="student_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="student_password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="student_password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register as Student</button>
                </form>
            </div>

            <!-- Teacher Form -->
            <div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
                <form action="{{ url('register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="teacher">
                    <div class="mb-3">
                        <label for="teacher_name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="teacher_name"
                            value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="teacher_email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="teacher_email"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="teacher_password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="teacher_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="teacher_password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="teacher_password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register as Teacher</button>
                </form>
            </div>

            <!-- Admin Form -->
            <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                <form action="{{ url('register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="admin">
                    <div class="mb-3">
                        <label for="admin_name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="admin_name"
                            value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="admin_email"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="admin_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="admin_password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="admin_password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register as Admin</button>
                </form>
            </div>
            <div class="footer mt-3 text-center">
                <p>Already have an account? <a href="{{ url('login') }}">Login</a></p>
                <p>&copy; {{ date('Y') }} MyExamSathi. All rights reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
