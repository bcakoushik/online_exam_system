<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid mx-3">
            <a class="navbar-brand fw-bold" href="#">MyExamSathi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="{{ route('userLogin') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('userRegister') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero bg-light py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Welcome to the MY EXAM SATHI</h1>
            <p class="lead mb-4">Your platform for seamless, secure, and efficient online assessments.</p>
            <a href="{{ route('userLogin') }}" class="btn btn-primary btn-lg me-2">Start Exam</a>
        </div>
    </section>

    <!-- Exam List Section -->
    <section class="exam-list py-5">
        <div class="container">
            <h2 class="text-center mb-4">Available Exams</h2>
            <div id="exam-list" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Exam cards will be dynamically populated here -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} MyExamSathi
. All rights reserved.</p>
        </div>
    </footer>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        // Sample script to populate exam list dynamically
        $(document).ready(function() {
            const exams = [
                { title: "Mathematics 101", description: "Basic algebra and geometry.", date: "2025-08-01" },
                { title: "Physics Fundamentals", description: "Mechanics and thermodynamics.", date: "2025-08-05" },
                { title: "Programming Basics", description: "Introduction to Python.", date: "2025-08-10" }
            ];

            exams.forEach(exam => {
                $('#exam-list').append(`
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">${exam.title}</h5>
                                <p class="card-text">${exam.description}</p>
                                <p class="card-text"><small class="text-muted">Date: ${exam.date}</small></p>
                                <a href="{{ route('userLogin') }}" class="btn btn-primary">Take Exam</a>
                            </div>
                        </div>
                    </div>
                `);
            });
        });
    </script>
</body>
</html>
