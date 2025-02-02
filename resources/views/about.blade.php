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
    @vite(['public/css/style.css'])

</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container fade-in">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>{{ $media->email ?? 'Not Available' }}</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>{{ $media->telepon ?? 'Not Available' }}</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="{{ $media->facebook ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->facebook ?? '' }}') alert('Belum tersedia');">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="{{ $media->twitter ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->twitter ?? '' }}') alert('Belum tersedia');">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="{{ $media->tiktok ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->tiktok ?? '' }}') alert('Belum tersedia');">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a class="text-primary px-3" href="{{ $media->instagram ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->instagram ?? '' }}') alert('Belum tersedia');">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="{{ $media->youtube ?? 'javascript:void(0);' }}"
                            onclick="if(!'{{ $media->youtube ?? '' }}') alert('Belum tersedia');">
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
                        <a href="{{ route(name: 'tentang') }}" class="nav-item nav-link active">Tentang</a>
                        <a href="{{ route('produk') }}" class="nav-item nav-link">Produk</a>
                        <a href="{{ route(name: 'wisata') }}" class="nav-item nav-link">Wisata</a>
                        <a href="{{ route(name: 'contact') }}" class="nav-item nav-link">Contact</a>
                        <span class="spacer-navbar"></span>
                        @if (Auth::check())
                            <div class="nav-item nav-link dropdown">
                                <span class="dropdown-toggle" data-toggle="dropdown">Halo,
                                    {{ Auth::user()->name ?? Auth::user()->username }}</span>
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
                <h3 class="display-4 text-white text-uppercase">Tentang Kami</h3>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid mt-5">
        <div class="container py-5 fade-in">
            <div class="row py-5">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100"
                            src="{{ isset($about) && $about->image ? asset('storage/' . $about->image) : asset('img/carousel-1.webp') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Tentang Kami</h6>
                        <h1 class="mb-3">Kami menyediakan pengalaman wisata asri</h1>
                        <p>
                            {{ $about->text ??
                                'Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et
                                                                                                                                                                        erat sed diam duo' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class="container-fluid pb-5 mt-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">Kami memberikan harga terbaik tanpa mengurangi kualitas layanan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Layanan kami siap memenuhi kebutuhan Anda dengan sempurna</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Wide Coverage</h5>
                            <p class="m-0">Layanan kami menjangkau berbagai wilayah, memastikan kemudahan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

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
                        onclick="if(!'{{ $media->twitter ?? '' }}') alert('Belum tersedia');"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2"
                        href="{{ $media->facebook ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->facebook ?? '' }}') alert('Belum tersedia');"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2"
                        href="{{ $media->tiktok ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->tiktok ?? '' }}') alert('Belum tersedia');"><i
                            class="fab fa-tiktok"></i></a>
                    <a class="btn btn-outline-primary btn-square"
                        href="{{ $media->instagram ?? 'javascript:void(0);' }}"
                        onclick="if(!'{{ $media->instagram ?? '' }}') alert('Belum tersedia');"><i
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
    <!-- Footer prodi part -->
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left justify-content-end align-items-center">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right d-flex justify-content-end align-items-center">
                <p class="m-0 text-white-50">Designed by <a href="https://telkomuniversity.ac.id">Telkom</a></p>
                <!-- New Images -->
                <div class="d-flex ml-3">
                    <a href="https://dsm.telkomuniversity.ac.id" target="_blank">
                        <img src="img/d4trm.png" class="img-fluid mx-1 logo-prodi" alt="D4TRM">
                    </a>
                    <a href="https://dmm.telkomuniversity.ac.id" target="_blank">
                        <img src="img/d3mp.webp" class="img-fluid mx-1 logo-prodi" alt="D3MP">
                    </a>
                    <a href="https://dho.telkomuniversity.ac.id/en/" target="_blank">
                        <img src="img/d3ph.png" class="img-fluid mx-1 logo-prodi" alt="D3PH">
                    </a>
                    <a href="https://dte.telkomuniversity.ac.id" target="_blank">
                        <img src="img/d3tt.png" class="img-fluid mx-1 logo-prodi" alt="D3TT">
                    </a>
                </div>
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
