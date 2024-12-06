<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Icon tab -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/thmb.svg') }}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <title>Sign Up Bumi Wangi</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- Left Image Section -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>

            <!-- Right Login Section -->
            <div class="col-md-6 bg-light">
                <!-- Button balik ke Beranda -->
                <div class="back-button">
                    <a href="{{ route('index') }}" class="btn-back">
                        <span class="arrow me-3">← </span>
                        Kembali ke Beranda       
                    </a>
                </div>
                <!-- Isi konten -->
                <div class="login d-flex align-items-center py-5">
                    <div class="container fade-in">
                        <div class="row">
                            <div class="col-lg-7 col-xl-6 mx-auto">
                                <h1><strong>SIGN UP</strong></h1>
                                <br>
                                <form>
                                    <!-- Nama Input -->
                                    <div class="form-group mb-3">
                                        <input 
                                            id="inputNama" 
                                            type="text" 
                                            placeholder="Masukkan Nama Pengguna" 
                                            required 
                                            autofocus 
                                            class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>

                                    <!-- Email Input -->
                                    <div class="form-group mb-3">
                                        <input 
                                            id="inputEmail" 
                                            type="email" 
                                            placeholder="Masukkan Alamat Email" 
                                            required 
                                            autofocus 
                                            class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>

                                    <!-- Nomor Hape Input -->
                                    <div class="form-group mb-3">
                                        <input 
                                            id="inputNope" 
                                            type="text" 
                                            placeholder="Masukkan Nomor HP" 
                                            required 
                                            autofocus 
                                            class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-group mb-3">
                                        <input 
                                            id="inputPassword" 
                                            type="password" 
                                            placeholder="Masukkan Password" 
                                            required 
                                            autofocus 
                                            class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-group mb-3">
                                        <input 
                                            id="inputPasswordSecond" 
                                            type="password" 
                                            placeholder="Masukkan Kembali Password" 
                                            required 
                                            class="form-control rounded-pill border-0 shadow-sm px-4 text-danger">
                                        <br>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn  text-uppercase mb-2 rounded-pill shadow-sm">Sign Up</button>

                                    <!-- Create Account Link -->
                                    <div class="d-flex mt-4">
                                        <p class="text-muted font-italic mb-0">Sudah punya akun? </p>
                                        <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none ms-2">
                                            Masuk
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>