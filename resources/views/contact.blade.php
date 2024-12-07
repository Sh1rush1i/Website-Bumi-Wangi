<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Bumi Wangi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Icon tab -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/thmb.svg') }}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container fade-in">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>{{ $media->email }}</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>{{ $media->telepon }}</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="{{ $media->facebook ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->facebook }}') alert('Belum tersedia');">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="{{ $media->twitter ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->twitter }}') alert('Belum tersedia');">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="{{ $media->tiktok ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->tiktok }}') alert('Belum tersedia');">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a class="text-primary px-3" href="{{ $media->instagram ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->instagram }}') alert('Belum tersedia');">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="{{ $media->youtube ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->youtube }}') alert('Belum tersedia');">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand fade-in">
                    <h1 class="m-0 text-primary"><span class="text-dark">BUMI</span>WANGI</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto fade-in">
                        <a href="{{ route('index') }}" class="nav-item nav-link">Beranda</a>
                        <a href="{{ route(name: 'tentang') }}" class="nav-item nav-link">Tentang</a>
                        <a href="{{ route('produk') }}" class="nav-item nav-link">Produk</a>
                        <a href="{{ route(name: 'wisata') }}" class="nav-item nav-link">Wisata</a>
                        <a href="contact.html" class="nav-item nav-link active">Contact</a>
                        <span class="spacer-navbar"></span>
                        @if (Auth::check())
                            <div class="nav-item nav-link dropdown">
                                <span class="dropdown-toggle" data-toggle="dropdown">Halo,
                                    {{ Auth::user()->name }}</span>
                                <div class="dropdown-menu">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Log out</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="button-login">
                                <a href="{{ route('user-login') }}">Login</a>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid page-header"
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../img/carousel-1.webp), no-repeat center center;">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center fade-in" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Hubungi Kami</h3>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container fade-in con-ct">
        <div class="row">
            <!-- Facebook -->
            <div class="col-md-4 social-card">
                <a href="{{ $media->facebook ?? 'javascript:void(0);' }}"
                    onclick="if(!'{{ $media->facebook }}') alert('Belum tersedia');" target="_blank"
                    class="text-decoration-none text-dark">
                    <div class="icon-circle">
                        <i class="fab fa-facebook"></i>
                    </div>
                    <h5>Facebook</h5>
                </a>
            </div>
            <!-- Twitter -->
            <div class="col-md-4 social-card">
                <a href="{{ $media->twitter ?? 'javascript:void(0);' }}"
                    onclick="if(!'{{ $media->twitter }}') alert('Belum tersedia');" target="_blank"
                    class="text-decoration-none text-dark">
                    <div class="icon-circle">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <h5>Twitter</h5>
                </a>
            </div>
            <!-- Instagram -->
            <div class="col-md-4 social-card">
                <a href="{{ $media->instagram ?? 'javascript:void(0);' }}"
                    onclick="if(!'{{ $media->instagram }}') alert('Belum tersedia');" target="_blank"
                    class="text-decoration-none text-dark">
                    <div class="icon-circle">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h5>Instagram</h5>
                </a>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <!-- TikTok -->
            <div class="col-md-4 social-card">
                <a href="{{ $media->tiktok ?? 'javascript:void(0);' }}"
                    onclick="if(!'{{ $media->tiktok }}') alert('Belum tersedia');" target="_blank"
                    class="text-decoration-none text-dark">
                    <div class="icon-circle">
                        <i class="fab fa-tiktok"></i>
                    </div>
                    <h5>TikTok</h5>
                </a>
            </div>
            <!-- YouTube -->
            <div class="col-md-4 social-card">
                <a href="{{ $media->youtube ?? 'javascript:void(0);' }}"
                    onclick="if(!'{{ $media->youtube }}') alert('Belum tersedia');" target="_blank"
                    class="text-decoration-none text-dark">
                    <div class="icon-circle">
                        <i class="fab fa-youtube"></i>
                    </div>
                    <h5>YouTube</h5>
                </a>
            </div>
        </div>
    </div>

    <!-- Card kontak langsung -->
    <div class="container mt-5 fade-in">
        <div class="row align-items-stretch">
            <!-- Telpon -->
            <div class="col-md-6 d-flex">
                <div class="card-custom w-100 d-flex flex-column">
                    <div class="circle mb-3">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-content flex-grow-1 text-center">
                        <h5>Contact Person</h5>
                        <p>Hubungi kami langsung melalui WhatsApp</p>
                    </div>
                    <a href="{{ $media->whatsapp ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->whatsapp }}') alert('Belum tersedia');">
                        <button class="btn btn-custom mt-auto">
                            <i class="fas fa-phone-alt"></i> Hubungi
                        </button>
                    </a>
                </div>
            </div>
            <!-- Email -->
            <div class="col-md-6 d-flex">
                <div class="card-custom w-100 d-flex flex-column">
                    <div class="circle mb-3">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="card-content flex-grow-1 text-center">
                        <h5>Email Support</h5>
                        <p>Butuh bantuan? Hubungi kami melalui dukungan email.</p>
                    </div>
                    <a href="mailto:{{ $media->email ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->email }}') alert('Belum tersedia');"><button
                            class="btn btn-custom mt-auto">
                            <i class="fas fa-envelope-open-text"></i> Hubungi
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">BUMI</span>WANGI</h1>
                </a>
                <p>Kami menawarkan pengalaman wisata lokal terbaik dan produk kerajinan asli Indonesia</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2"
                        href="{{ $media->twitter ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->twitter }}') alert('Belum tersedia');"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2"
                        href="{{ $media->facebook ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->facebook }}') alert('Belum tersedia');"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2"
                        href="{{ $media->tiktok ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->tiktok }}') alert('Belum tersedia');"><i
                            class="fab fa-tiktok"></i></a>
                    <a class="btn btn-outline-primary btn-square"
                        href="{{ $media->instagram ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->instagram }}') alert('Belum tersedia');"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 order-lg-3 text-lg-right">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
                <div class="d-flex flex-column justify-content-start align-items-lg-end">
                    <a class="text-white-50 mb-2" href="{{ route('tentang') }}"><i
                            class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="{{ route('produk') }}"><i
                            class="fa fa-angle-right mr-2"></i>Produk</a>
                    <a class="text-white-50 mb-2" href="{{ route('wisata') }}"><i
                            class="fa fa-angle-right mr-2"></i>Wisata</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Pesan</a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 order-lg-4 text-lg-right">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>{{ $media->alamat ?? 'Not Available' }}</p>
                <p><i class="fa fa-phone-alt mr-2"></i>{{ $media->email ?? 'Not Available' }}</p>
                <p><i class="fa fa-envelope mr-2"></i>{{ $media->telepon ?? 'Not Available' }}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Designed by <a href="">Telkom</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    @yield('content')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
