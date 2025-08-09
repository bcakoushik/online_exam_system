<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Dynamic Title Using @yield  --}}
    <title>@yield('title', 'Student Dashboard')</title>
    {{-- Dynamic Title Using @yield  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/student/style.css') }}">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#" class="text-center mx-auto">MyExamSathi</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Student Panel
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-book pe-2"></i>
                            My Exams
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-clipboard pe-2"></i>
                            Attempted Exams
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-square-poll-vertical pe-2"></i>
                            Results
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-user pe-2"></i>
                            Profile
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link text-danger"
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) { document.getElementById('logout-form').submit(); }">
                            <i class="fa-solid fa-right-from-bracket pe-2"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{ asset('assets/images/profile.jpg') }}" class="avatar img-fluid rounded"
                                    alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>

                                <!-- Logout with Confirmation -->
                                <a href="#" class="dropdown-item text-danger"
                                    onclick="event.preventDefault();
                                    if (confirm('Are you sure you want to logout?')) {
                                    document.getElementById('logout-form').submit();
                                    }">
                                    Logout
                                </a>
                                <!-- Hidden Form -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    {{-- Dynamic content Using @yield  --}}
                    @yield('content')
                    {{-- Dynamic content Using @yield  --}}
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid p-0 m-0">
                    <div class="row py-2 m-0">
                        <div class="col-6 text-center">
                            <ul class="list-inline p-0 m-0">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted fw-semibold">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted fw-semibold">FAQs</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted fw-semibold">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted fw-semibold">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 text-center text-white">
                            <p class="mb-0">
                                <a href="#" class="text-white">
                                    <strong >My Exam Sathi</strong>
                                </a> &copy; {{ date('Y') }}
                            </p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/student/script.js') }}"></script>
</body>
</html>
