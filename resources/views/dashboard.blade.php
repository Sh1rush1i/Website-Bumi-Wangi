<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Icon tab -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/thmb.svg') }}" />

    @vite(['resources/sass/app.scss', 'resources/js/dashboard.js'])

    <title>Admin Bumi Wangi</title>
</head>

<body id="body-pd">
    <!--Header -->
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>

    <!-- Navbar -->
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="/" class="nav_logo d-flex align-items-center">
                    <img src="{{ asset('img/atmin.png') }}" alt="Bumi Wangi Logo" class="logo-img" style="width: 25px; height: auto;">
                    <span class="nav_logo-name">Bumi Wangi</span>
                </a>
                <div class="nav_list">
                    <a href="" id="menu-dashboard" class="nav_link active"> <i
                            class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span></a>
                    <a href="" id="menu-input-produk" class="nav_link"> <i
                            class='bx bxs-purchase-tag nav_icon'></i></i> <span class="nav_name">Input Produk</span>
                    </a>
                    <a href="" id="menu-input-wisata" class="nav_link"> <i class='bx bx-leaf nav_icon'></i></i>
                        <span class="nav_name">Input Wisata</span> </a>
                    <a href="" id="menu-input-tentang" class="nav_link"> <i class='bx bx-info-circle nav_icon'></i></i>
                        <span class="nav_name">Input About</span> </a>
                    <a href="" id="menu-input-info" class="nav_link"> <i class='bx bx-phone-call nav_icon'></i></i>
                        <span class="nav_name">Input Informasi</span> </a>
                    <a href="" id="menu-pembelian"class="nav_link"> <i
                            class='bx bxs-shopping-bag-alt nav_icon'></i></i> <span class="nav_name">Pesanan</span> </a>
                </div>
                <form action="{{ route('logout') }}" method="POST" id="logout-form" class="display-none">
                    @csrf
                </form>
                <a href="#" class="nav_link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i
                        class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4 class="h2"><strong>Dashboard Admin</strong></h4>
        <hr>

        <!-- Item Display -->
        <div id="dashboard-content" class="container-fluid">
            <div class="mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">PRODUK</h6>
                <h3>List Produk</h3>
            </div>
            {{-- List Produk --}}
            <div class="row">
                <!-- Item 1 -->
                @foreach ($produk as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3">
                        <div class="package-item bg-white shadow position-relative">
                            <!-- Icon Section -->
                            <div class="card-icons position-absolute top-0 end-0 m-2">
                                <a href="#" class="text-primary mx-1" title="Read"><i
                                        class="bx bx-show"></i></a>
                                <a href="#" class="text-warning mx-1" title="Update" data-bs-toggle="modal" data-bs-target="#updateModal">
                                <i class="bx bx-edit"></i>
                                </a>
                                <a href="#" class="text-danger mx-1" title="Delete"><i
                                        class="bx bx-trash"></i></a>
                            </div>
                            <!-- Card Content -->
                            <img class="img-fluid" src="{{ asset('storage/' . $item->gambar) }}" alt="Product Image">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small><i class="bx bx-tag text-primary"></i> Brand New</small>
                                    <small><i class="bx bx-box text-primary"></i> {{ $item->satuan }}</small>
                                </div>
                                <div class="product-item">
                                    <a class="h5 text-decoration-none" href="#">{{ $item->nama }}</a>
                                    <a class="h6 text-muted text-truncate-2 d-block mt-2"
                                        href="#">{{ $item->deskripsi }}</a>
                                </div>
                                <div class="border-top mt-4 pt-4">
                                    <h5>IDR {{ number_format($item->harga, 0, ',', '.') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4 mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Wisata</h6>
                <h3>List Wisata</h3>
            </div>
            {{-- List Wisata --}}
            <div class="row">
                <!-- Item 1 -->
                @foreach ($wisata as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3">
                        <div class="package-item bg-white shadow position-relative">
                            <!-- Icon Section -->
                            <div class="card-icons position-absolute top-0 end-0 m-2">
                                <a href="#" class="text-primary mx-1" title="Read"><i
                                        class="bx bx-show"></i></a>
                                <a href="#" class="text-warning mx-1" title="Update"><i
                                        class="bx bx-edit"></i></a>
                                <a href="#" class="text-danger mx-1" title="Delete"><i
                                        class="bx bx-trash"></i></a>
                            </div>
                            <!-- Card Content -->
                            <img class="img-fluid" src="{{ asset('storage/' . $item->gambar) }}" alt="Product Image">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small><i class="bx bx-tag text-primary"></i> Brand New</small>
                                    <small><i class="bx bx-box text-primary"></i> {{ $item->satuan }}</small>
                                </div>
                                <div class="product-item">
                                    <a class="h5 text-decoration-none" href="#">{{ $item->nama }}</a>
                                    <a class="h6 text-muted text-truncate-2 d-block mt-2"
                                        href="#">{{ $item->deskripsi }}</a>
                                </div>
                                <div class="border-top mt-4 pt-4">
                                    <h5>IDR {{ number_format($item->harga, 0, ',', '.') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="spacer" style="height: 50px;"></div>
        </div>

        <!-- Form Produk -->
        <div id="produk-content" class="d-none">
            <div class="mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Produk</h6>
                <h3>Input Produk</h3>
            </div>
            <div class="container-fluid">
                <form action="{{ route('produk-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan nama produk" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                            placeholder="Masukkan deskripsi produk" required></textarea>
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga"
                            placeholder="Masukkan harga produk" required>
                    </div>

                    <!-- Satuan -->
                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan"
                            placeholder="Masukkan satuan produk" required>
                    </div>

                    <!-- Upload Photo -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Photo</label>
                        <input type="file" class="form-control" id="gambar" name="gambar"
                            accept=".jpeg, .jpg, .png" required>
                        <small class="form-text text-muted">Max size: 10 MB | Format: jpeg, jpg, png</small>
                    </div>

                    <!-- Upload Video -->
                    <!--
                    <div class="mb-3">
                        <label for="video" class="form-label">Upload Video</label>
                        <input type="file" class="form-control" id="video" name="video" accept=".mp4">
                        <small class="form-text text-muted">Max size: 50 MB | Format: mp4 | Optional</small>
                    </div>
                    -->

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Form Wisata -->
        <div id="wisata-content" class="d-none">
            <div class="mt-4 mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Wisata</h6>
                <h3>Input Wisata</h3>
            </div>
            <div class="container-fluid">
                <form action="{{ route('wisata-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan nama wisata" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                            placeholder="Masukkan deskripsi wisata" required></textarea>
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga"
                            placeholder="Masukkan harga wisata" required>
                    </div>

                    <!-- Satuan -->
                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan"
                            placeholder="Masukkan satuan wisata" required>
                    </div>

                    <!-- Upload Photo -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Photo</label>
                        <input type="file" class="form-control" id="gambar" name="gambar"
                            accept=".jpeg, .jpg, .png" required>
                        <small class="form-text text-muted">Max size: 10 MB | Format: jpeg, jpg, png</small>
                    </div>

                    <!-- Upload Video -->
                    <!--
                    <div class="mb-3">
                        <label for="video" class="form-label">Upload Video</label>
                        <input type="file" class="form-control" id="video" name="video" accept=".mp4">
                        <small class="form-text text-muted">Max size: 50 MB | Format: mp4 | Optional</small>
                    </div>
                    -->

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- About Content -->
        <div id="about-content" class="d-none">
            <div class="mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About</h6>
                <h3>Display Teks Halaman About</h3>
            </div>
            <div class="container-fluid">
                <!-- Display Current About Text -->
                <div class="mb-4">
                    <h5>About Text Sekarang:</h5>
                    <p id="current-about-text" class="bg-light p-3 border rounded">
                        Ini About le
                    </p>
                </div>

                <!-- Update About Text Form -->
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="about-text" class="form-label">Update About Text</label>
                        <textarea class="form-control" id="about-text" name="text" rows="5"
                            placeholder="Masukkan teks baru untuk halaman About"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        <!-- Media Information -->
        <div id="info-content" class="d-none">
            <div class="mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Informasi Sosial Media</h6>
                <h3>Input Informasi Media</h3>
            </div>
            <div class="container-fluid">
                <!-- Display Current Social Media Links -->
                <div class="mb-4">
                    <h5>Informasi Media Saat Ini:</h5>
                    <ul id="current-social-media-list" class="list-group">
                        <li class="list-group-item">
                            <i class='bx bxl-facebook-circle text-primary'></i>
                            Facebook:
                        </li>
                        <li class="list-group-item">
                            <i class='bx bxl-twitter text-primary me-2'></i>
                            Twitter:
                        </li>
                        <li class="list-group-item">
                            <i class='bx bxl-instagram text-danger me-2'></i>
                            Instagram: <span></span>
                        </li>
                        <li class="list-group-item">
                            <i class='bx bxl-tiktok text-dark me-2'></i>
                            TikTok: <span></span>
                        </li>
                        <li class="list-group-item">
                            <i class='bx bxl-youtube text-danger me-2'></i>
                            Youtube: <span></span>
                        </li>
                        <li class="list-group-item">
                            <i class='bx bx-phone-call text-primary me-2'></i>
                            Telepon: <span></span>
                        </li>
                        <li class="list-group-item">
                            <i class='bx bx-envelope text-primary me-2'></i>
                            Email: <span></span>
                        </li>
                        <li class="list-group-item">
                            <i class='bx bx-map text-danger me-2'></i>
                            Alamat: <span></span>
                        </li>
                        <li class="list-group-item">
                            <i class='bx bxl-whatsapp text-success me-2'></i>
                            Link Chat Whatsapp: <span></span>
                        </li>
                    </ul>
                </div>

                <!-- Form to Update Social Media Links -->
                <form action="" method="POST">
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxl-facebook-circle text-primary'></i>
                            <label for="facebook" class="form-label ms-3">Facebook</label>
                        </div>
                        <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Masukkan link Facebook">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxl-twitter text-info'></i>
                            <label for="twitter" class="form-label ms-3">Twitter</label>
                        </div>
                        <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Masukkan link Twitter">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxl-instagram text-danger'></i>
                            <label for="instagram" class="form-label ms-3">Instagram</label>
                        </div>
                        <input type="url" class="form-control" id="instagram" name="instagram" placeholder="Masukkan link Instagram">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxl-tiktok text-dark'></i>
                            <label for="tiktok" class="form-label ms-3">TikTok</label>
                        </div>
                        <input type="url" class="form-control" id="tiktok" name="tiktok" placeholder="Masukkan link TikTok">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxl-youtube text-danger'></i>
                            <label for="youtube" class="form-label ms-3">Youtube</label>
                        </div>
                        <input type="url" class="form-control" id="youtube" name="youtube" placeholder="Masukkan link Youtube">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxs-phone text-success'></i>
                            <label for="telpon" class="form-label ms-3">Telepon</label>
                        </div>
                        <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxs-envelope text-primary'></i>
                            <label for="email" class="form-label ms-3">Email</label>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxs-map text-danger'></i>
                            <label for="email" class="form-label ms-3">Alamat</label>
                        </div>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <i class='bx bxl-whatsapp text-success'></i>
                            <label for="email" class="form-label ms-3">Link Chat Whatsapp</label>
                        </div>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Masukkan alamat">
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Update Informasi</button>
                </form>
            </div>
        </div>

        <!-- tabel Pembelian -->
        <div id="pembelian" class="d-none mt-4 mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Beli</h6>
            <h3>Pembelian?</h3>
        </div>
    </div>
    <!--Container Main end-->
    @include('sweetalert::alert')

    <!-- Update Modal -->
    <div class="modal fade shadow p-3" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- ID (Hidden) -->
                        <input type="hidden" id="update-id" name="id">

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="update-nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="update-nama" name="nama" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="update-deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="update-deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label for="update-harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="update-harga" name="harga" required>
                        </div>

                        <!-- Satuan -->
                        <div class="mb-3">
                            <label for="update-satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="update-satuan" name="satuan" required>
                        </div>

                        <!-- Gambar -->
                        <div class="mb-3">
                            <label for="update-gambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="update-gambar" name="gambar" accept=".jpeg, .jpg, .png">
                            <small class="form-text text-muted">Max size: 10 MB | Format: jpeg, jpg, png</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
