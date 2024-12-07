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
                    <div class="navbar-nav ml-auto py-0 fade-in">
                        <a href="{{ route('index') }}" class="nav-item nav-link">Beranda</a>
                        <a href="{{ route('tentang') }}" class="nav-item nav-link">Tentang</a>
                        <a href="{{ route('produk') }}" class="nav-item nav-link active">Produk</a>
                        <a href="{{ route('wisata') }}" class="nav-item nav-link">Wisata</a>
                        <a href="{{ route(name: 'contact') }}" class="nav-item nav-link">Contact</a>
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
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../img/carousel-2.webp), no-repeat center center;">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center fade-in" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Produk</h3>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3 fade-in">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">PRODUK</h6>
                <h1>Produk Andalan Kami</h1>
            </div>
            <!-- Ini item 1 wak -->
            <div class="row d-flex justify-content-center">
                @foreach ($produk as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <div class="d-flex justify-content-center align-items-center"
                                style="height: 250px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="" class="img-fluid"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-tag text-primary mr-2"></i>Brand New</small>
                                    <small class="m-0"><i
                                            class="fa fa-box text-primary mr-2"></i>{{ $item->satuan }}</small>
                                </div>
                                <div class="product-item">
                                    <a class="h5 text-decoration-none" href="#">{{ $item->nama }}</a>
                                    <a class="h6 text-decoration-none d-block mt-2 text-muted text-truncate-2"
                                        href="#">{{ $item->deskripsi }}</a>
                                </div>

                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">IDR {{ number_format($item->harga, 0, ',', '.') }}</h5>
                                        <form action="{{ route('book') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_produk" value="{{ $item->id }}">
                                            <input type="hidden" name="type" value="produk">
                                            <input type="hidden" name="nama_produk" value="{{ $item->nama }}">
                                            <input type="hidden" name="harga" value="{{ $item->harga }}">
                                            <input type="hidden" name="gambar_produk" value="{{ $item->gambar }}">
                                            <button class="btn btn-primary btn-sm">Pesan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Packages End -->

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
