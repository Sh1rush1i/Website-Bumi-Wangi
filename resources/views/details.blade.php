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
                        <p><i class="fa fa-envelope mr-2"></i></p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i></p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="" onclick="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="" onclick="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="" onclick="">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a class="text-primary px-3" href="" onclick="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="" onclick="">
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
                        <a href="{{ route('produk') }}" class="nav-item nav-link">Produk</a>
                        <a href="{{ route('wisata') }}" class="nav-item nav-link">Wisata</a>
                        <a href="{{ route(name: 'contact') }}" class="nav-item nav-link">Contact</a>
                        <span class="spacer-navbar"></span>

                        <div class="nav-item nav-link dropdown">
                            <span class="dropdown-toggle" data-toggle="dropdown">Halo,
                            </span>
                            <div class="dropdown-menu">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log out</button>
                                </form>
                            </div>
                        </div>

                        <div class="button-login">
                            <a href="{{ route('user-login') }}">Login</a>
                        </div>

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

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container d-flex flex-column">
            <div class="row">
                <!-- Kolom untuk gambar -->
                <div class="col-md-6 d-flex flex-column align-items-center text-center fade-in">
                    <!-- Carousel view -->
                    <div class="container-fluid d-flex align-items-center justify-content-center mb-3">
                        <i class="fas fa-images fa-2x"></i>
                        <h4 class="ml-2 mb-0">Gallery</h4>
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($image as $key => $item)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $item->path) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev kontrol" type="button"
                            data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon k-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next kontrol" type="button"
                            data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon k-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>

                    @if (isset($video))
                        <!-- Video view -->
                        <div class="mb-4" style="width:100%;">
                            <div
                                class="container-fluid d-flex align-items-center justify-content-center mb-3                        ">
                                <i class="fas fa-video fa-2x"></i>
                                <h4 class="ml-2 mb-0">Video</h4>
                            </div>
                            <!-- Video Player -->
                            <video controls style="width: 100%; max-width: 800px; height: auto;">
                                <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif

                    <!-- 360 view -->
                    @if (isset($image360) || isset($video360))
                        <div class="mb-4" style="width:100%;">
                            <div class="container-fluid d-flex align-items-center justify-content-center mb-3">
                                <i class="fas fa-street-view fa-2x"></i>
                                <h4 class="ml-2 mb-0">360° View </h4>
                            </div>
                            <div id="three-container" style="width: 100%; height: 300px; object-fit: cover;"
                                data-image-src="{{ isset($image360) ? asset('storage/' . $image360->path) : '' }}"
                                data-video-src="{{ isset($video360) ? asset('storage/' . $video360->path) : '' }}">
                            </div>
                        </div>
                    @endif


                    <!-- Picture view -->
                    <div class="mb-4" style="width:100%;">
                        <div class="container-fluid d-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-images fa-2x"></i>
                            <h4 class="ml-2 mb-0">Others</h4>
                        </div>
                        <!-- Ini kamu loop aja ntar gambarnya-->
                        @foreach ($image as $item)
                            <img src="{{ asset('storage/' . $item->path) }}" alt="Image 2" class="mb-3"
                                style="width: 100%; height: auto; object-fit: cover;">
                        @endforeach

                    </div>
                </div>
                <!-- Data -->
                <div class="col-md-6 fade-in">
                    <h2 class="mb-4 prd-c">{{ $detail->nama }}</h2>
                    <p style="text-align: justify;"><strong>Deskripsi: </strong><br>
                        {{ $detail->deskripsi }}
                        <span></span>
                    </p>
                    <div class="mt-4">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><strong>Harga</strong></td>
                                    <td>: {{ $detail->harga }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Satuan</strong></td>
                                    <td>: {{ $detail->satuan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button id="order-button" class="btn btn-primary mt-4 btn-custom"
                        style="width: 100%;">Pesan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

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
                    <a class="btn btn-outline-primary btn-square mr-2" onclick=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" onclick=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" onclick=""><i
                            class="fab fa-tiktok"></i></a>
                    <a class="btn btn-outline-primary btn-square" onclick=""><i class="fab fa-instagram"></i></a>
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
                <p><i class="fa fa-map-marker-alt mr-2"></i></p>
                <p><i class="fa fa-phone-alt mr-2"></i></p>
                <p><i class="fa fa-envelope mr-2"></i></p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/viewer.js') }}"></script>
</body>

</html>
