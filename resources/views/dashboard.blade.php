<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/dashboard.js'])

    <title>Admin BW</title>
</head>

<body id="body-pd">
    <!--Header -->
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>

    <!-- Navbar -->
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                        class="nav_logo-name">Bumi Wangi</span> </a>
                <div class="nav_list">
                    <a href="" id="menu-dashboard" class="nav_link active"> <i
                            class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span></a>
                    <a href="" id="menu-input-produk" class="nav_link"> <i
                            class='bx bxs-purchase-tag nav_icon'></i></i> <span class="nav_name">Input Produk</span>
                    </a>
                    <a href="" id="menu-input-wisata" class="nav_link"> <i class='bx bx-leaf nav_icon'></i></i>
                        <span class="nav_name">Input Wisata</span> </a>
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
            <div class="row">
                <!-- Item 1 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3">
                    <div class="package-item bg-white shadow position-relative">
                        <!-- Icon Section -->
                        <div class="card-icons position-absolute top-0 end-0 m-2">
                            <a href="#" class="text-primary mx-1" title="Read"><i class="bx bx-show"></i></a>
                            <a href="#" class="text-warning mx-1" title="Update"><i class="bx bx-edit"></i></a>
                            <a href="#" class="text-danger mx-1" title="Delete"><i class="bx bx-trash"></i></a>
                        </div>
                        <!-- Card Content -->
                        <img class="img-fluid" src="img/produk.webp" alt="Product Image">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small><i class="bx bx-tag text-primary"></i> Brand New</small>
                                <small><i class="bx bx-box text-primary"></i> 1 Pcs</small>
                            </div>
                            <div class="product-item">
                                <a class="h5 text-decoration-none" href="#">Produk 1</a>
                                <a class="h6 text-muted text-truncate-2 d-block mt-2" href="#">Ini deskripsi
                                    produk yang panjang</a>
                            </div>
                            <div class="border-top mt-4 pt-4">
                                <h5>IDR 350.000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Wisata</h6>
                <h3>List Wisata</h3>
            </div>
            <div class="row">
                <!-- Item 1 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3">
                    <div class="package-item bg-white shadow position-relative">
                        <!-- Icon Section -->
                        <div class="card-icons position-absolute top-0 end-0 m-2">
                            <a href="#" class="text-primary mx-1" title="Read"><i class="bx bx-show"></i></a>
                            <a href="#" class="text-warning mx-1" title="Update"><i class="bx bx-edit"></i></a>
                            <a href="#" class="text-danger mx-1" title="Delete"><i
                                    class="bx bx-trash"></i></a>
                        </div>
                        <!-- Card Content -->
                        <img class="img-fluid" src="img/produk.webp" alt="Product Image">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small><i class="bx bx-tag text-primary"></i> Brand New</small>
                                <small><i class="bx bx-box text-primary"></i> 1 Pcs</small>
                            </div>
                            <div class="product-item">
                                <a class="h5 text-decoration-none" href="#">Produk 1</a>
                                <a class="h6 text-muted text-truncate-2 d-block mt-2" href="#">Ini deskripsi
                                    produk yang panjang</a>
                            </div>
                            <div class="border-top mt-4 pt-4">
                                <h5>IDR 350.000</h5>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <div class="mb-3">
                        <label for="video" class="form-label">Upload Video</label>
                        <input type="file" class="form-control" id="video" name="video" accept=".mp4">
                        <small class="form-text text-muted">Max size: 50 MB | Format: mp4 | Optional</small>
                    </div>

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
                <form action="#" method="POST" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <label for="video" class="form-label">Upload Video</label>
                        <input type="file" class="form-control" id="video" name="video" accept=".mp4">
                        <small class="form-text text-muted">Max size: 50 MB | Format: mp4 | Optional</small>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
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
</body>

</html>
