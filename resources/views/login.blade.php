<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Admin Login</title>
</head>

<body class="body-login">
    <div class="container vh-100 d-flex align-items-center">
        <div class="row w-100">
            <!-- Image Column -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="img/login.webp" alt="Illustration" class="img-fluid" style="max-width: 80%;">
            </div>
            <!-- Form Column -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="card shadow w-100 custom-card">
                    <div class="card-body p-5 card-custom">
                        <div class="d-flex align-items-center justify-content-center mb-5">
                            <h1 class="text-center mb-0">Hi, Admin</h1>
                            <span class="wave ms-2" style="font-size: 2rem;">👋</span>
                        </div>
                        <form action="{{ route('login-api') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="username" class="form-label fw-bold"><i class="bi bi-person"></i>
                                    Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username">
                            </div>
                            <div class="mb-5">
                                <label for="password" class="form-label fw-bold"><i class="bi bi-lock"></i>
                                    Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-3 fw-bold btn-custom">Log
                                in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
