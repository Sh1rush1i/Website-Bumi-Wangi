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
                    <div class="navbar-nav ml-auto py-0 fade-in">
                        <a href="/" class="nav-item nav-link active">Beranda</a>
                        <a href="{{ route('tentang') }}" class="nav-item nav-link">Tentang</a>
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

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($carousel as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img class="w-100" src="{{ asset('storage/' . $item->image ?? '') }}" alt="Image"
                            style="height: 900px;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h1 class="display-3 text-white mb-md-4 fade-in">{{ $item->caption }}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-fluid mt-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 py-5">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Desa Wisata Bumi Wangi</h6>
                <h1>Jelajahi Pengalaman Unik di Wisata Bumi Wangi</h1>
            </div>
            <div class="row d-flex justify-content-center align-items-stretch">
                <!-- Wisata Alam -->
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <a href="{{ route('wisata') }}" class="text-decoration-none w-100">
                        <div class="service-item bg-white text-center mb-2 py-5 px-4 h-100">
                            <i class="fa fa-2x fa-tree mx-auto mb-4"></i>
                            <h5 class="mb-2 text-dark">Wisata Alam</h5>
                            <p class="m-0 text-dark">Nikmati keindahan alam yang menenangkan dengan berbagai destinasi
                                wisata yang asri dan menakjubkan</p>
                        </div>
                    </a>
                </div>
                <!-- Produk UMKM -->
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <a href="{{ route('produk') }}" class="text-decoration-none w-100">
                        <div class="service-item bg-white text-center mb-2 py-5 px-4 h-100">
                            <i class="fa fa-2x fa-gift mx-auto mb-4"></i>
                            <h5 class="mb-2 text-dark">Produk UMKM</h5>
                            <p class="m-0 text-dark">Nikmati pilihan produk unik dan berkualitas dari pelaku UMKM
                                terpercaya</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Paket Wisata Start -->
    <div class="container-fluid">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Paket Wisata</h6>
                <h1>Paket Wisata Kami</h1>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($wisata->take(6) as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="destination-item position-relative overflow-hidden mb-2">
                                <div class="d-flex justify-content-center align-items-center img-display">
                                    @php
                                        $firstImage = $image->where('wisata_id', $item->id)->first();
                                    @endphp
                                    <img class="img-fluid" src="{{ asset('storage/' . $firstImage->path) }}"
                                        alt="">
                                </div>
                                <a class="destination-overlay text-white text-decoration-none">
                                    <h5 class="text-white">{{ $item->nama }}</h5>
                                    <span>{{ $item->deskripsi }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Nambah produk di sini ntar -->
                </div>
            </div>
        </div>
        <a class="d-block text-center link-hover-green" href="{{ route(name: 'wisata') }}">Lihat lebih banyak >>></a>
    </div>
    <!-- Paket Wisata End -->

    <!-- Produk Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Produk</h6>
                <h1>Produk Unggulan Kami</h1>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($produk->take(6) as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="destination-item position-relative overflow-hidden mb-2">
                                <div class="d-flex justify-content-center align-items-center img-display">
                                    @php
                                        $firstImage = $image->where('produk_id', $item->id)->first();
                                    @endphp
                                    <img class="img-fluid" src="{{ asset('storage/' . $firstImage->path) }}"
                                        alt="">
                                </div>
                                <a class="destination-overlay text-white text-decoration-none">
                                    <h5 class="text-white">{{ $item->nama }}</h5>
                                    <span>{{ $item->deskripsi }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Nambah produk di sini ntar -->
                </div>
            </div>
        </div>
        <a class="d-block text-center link-hover-green" href="{{ route(name: 'produk') }}">Lihat lebih banyak >>></a>
    </div>
    <!-- Produk End -->

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
    @include('sweetalert::alert')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
