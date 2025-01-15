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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Icon tab -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/thmb.svg') }}" />

    @vite(['resources/sass/app.scss', 'resources/js/dashboard.js'])

    <title>Admin Bumi Wangi</title>
</head>

<body>
    <div id="body-pd" class="body">
        <!--Header -->
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <!-- Navbar -->
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="/" class="nav_logo d-flex align-items-center">
                        <img src="{{ asset('img/atmin.png') }}" alt="Bumi Wangi Logo" class="logo-img"
                            style="width: 25px; height: auto;">
                        <span class="nav_logo-name">Bumi Wangi</span>
                    </a>
                    <div class="nav_list">
                        <a href="" id="menu-dashboard" class="nav_link active"> <i
                                class='bx bx-grid-alt nav_icon'></i> 
                            <span class="nav_name">Dashboard</span></a>
                        <a href="" id="menu-input-produk" class="nav_link"> <i
                                class='bx bxs-purchase-tag nav_icon'></i></i> 
                            <span class="nav_name">Input Produk</span></a>
                        <a href="" id="menu-input-wisata" class="nav_link"> <i
                                class='bx bx-leaf nav_icon'></i></i>
                            <span class="nav_name">Input Wisata</span> </a>
                        <a href="" id="menu-input-beranda" class="nav_link"> <i
                            class='bx bxs-home nav_icon'></i></i> 
                        <span class="nav_name">Input Beranda</span></a>
                        <a href="" id="menu-input-tentang" class="nav_link"> <i
                                class='bx bx-info-circle nav_icon'></i></i>
                            <span class="nav_name">Input About</span> </a>
                        <a href="" id="menu-input-info" class="nav_link"> <i
                                class='bx bx-phone-call nav_icon'></i></i>
                            <span class="nav_name">Input Informasi</span> </a>
                        <a href="" id="menu-input-bayar" class="nav_link"> <i
                                class='bx bx-transfer nav_icon'></i></i>
                            <span class="nav_name">Input Pembayaran</span> </a>
                        <a href="" id="menu-pembelian"class="nav_link"> <i
                                class='bx bxs-shopping-bag-alt nav_icon'></i></i> <span class="nav_name">Pesanan</span>
                        </a>
                    </div>
                    <form action="{{ route('admin-logout') }}" method="POST" id="logout-form" class="display-none">
                        @csrf
                    </form>
                    <a href="#" class="nav_link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i
                            class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span>
                    </a>
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
                                    <!-- Update data icon -->
                                    <a href="#" class="text-warning mx-1" title="Update" data-bs-toggle="modal"
                                        data-bs-target="#updateModal" data-type="produk" data-id="{{ $item->id }}"
                                        data-nama="{{ $item->nama }}" data-deskripsi="{{ $item->deskripsi }}"
                                        data-harga="{{ $item->harga }}" data-satuan="{{ $item->satuan }}">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <!-- Delete data icon -->
                                    <a href="#" class="text-danger mx-1 delete-produk" title="Delete"
                                        data-id="{{ $item->id }}"><i class="bx bx-trash"></i></a>
                                    <form action="{{ route('produk-delete', $item->id) }}"
                                        method="POST"id="deleteFormProduk-{{ $item->id }}"
                                        style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                                <!-- Card Content -->
                                @php
                                    $firstImage = $image->where('produk_id', $item->id)->first();
                                @endphp
                                <img class="img-fluid" src="{{ asset('storage/' . $firstImage->path) }}"
                                    alt="Product Image">
                                <div class="p-4">
                                    <div class="d-flex justify-content-between mb-3">
                                        <small><i class="bx bx-tag text-primary"></i> Produk</small>
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
                                    <!-- Update data icon -->
                                    <a href="#" class="text-warning mx-1" title="Update"
                                        data-bs-toggle="modal" data-bs-target="#updateModal" data-type="wisata"
                                        data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"
                                        data-deskripsi="{{ $item->deskripsi }}" data-harga="{{ $item->harga }}"
                                        data-satuan="{{ $item->satuan }}">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <!-- Delete data icon -->
                                    <a href="#" class="text-danger mx-1 delete-wisata" title="Delete"
                                        data-id="{{ $item->id }}"><i class="bx bx-trash"></i></a>
                                    <form action="{{ route('wisata-delete', $item->id) }}"
                                        method="POST"id="deleteFormWisata-{{ $item->id }}"
                                        style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                                <!-- Card Content -->
                                @php
                                    $firstImage = $image->where('wisata_id', $item->id)->first();
                                @endphp
                                <img class="img-fluid" src="{{ asset('storage/' . $firstImage->path) }}"
                                    alt="Product Image">
                                <div class="p-4">
                                    <div class="d-flex justify-content-between mb-3">
                                        <small><i class="bx bx-tag text-primary"></i> Wisata</small>
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
                        <div class="mb-4">
                            <label for="gambar" class="form-label">Upload Photos</label>
                            <input type="file" class="form-control" id="gambar" name="gambar[]"
                                accept=".jpeg, .jpg, .png" multiple required>
                            <small class="form-text text-muted">Max size: 10 MB per file | Format: jpeg, jpg, png |
                                Bisa pilih lebih dari satu</small>
                        </div>

                        <!-- Upload Video -->
                        <div class="mb-4">
                            <label for="video" class="form-label">Upload Video Biasa</label>
                            <input type="file" class="form-control" id="video" name="video"
                                accept=".mp4">
                            <small class="form-text text-muted">Max size: 50 MB | Format: mp4 | Optional</small>
                        </div>

                        <div class="mb-4 ">
                            <p><strong>Pilih salah satu</strong></p>
                        </div>

                        <!-- Upload Photo 360 -->
                        <div class="mb-4" id="inputG360P">
                            <label for="gambar" class="form-label">Upload Photo 360°</label>
                            <input type="file" class="form-control" id="gambarP" name="360gambar"
                                accept=".jpeg, .jpg, .png">
                            <small class="form-text text-muted">Max size: 20 MB | Format: jpeg, jpg, png, 360, etc |
                                Optional</small>
                        </div>

                        <!-- Upload Video 360 -->
                        <div class="mb-4" id="inputV360P">
                            <label for="video" class="form-label">Upload Video 360°</label>
                            <input type="file" class="form-control" id="videoP" name="360video"
                                accept=".mp4">
                            <small class="form-text text-muted">Max size: 50 MB | Format: mp4, 360, etc |Optional</small>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex ">
                            <button type="submit" class="btn btn-primary me-3 mb-4">Submit</button>
                            <button type="reset" class="btn btn-secondary mb-4" id="clearButtonP">Clear</button>
                        </div>
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
                        <div class="mb-4" id="inputG360">
                            <label for="gambar" class="form-label">Upload Photos</label>
                            <input type="file" class="form-control" id="gambar" name="gambar[]"
                                accept=".jpeg, .jpg, .png" multiple required>
                            <small class="form-text text-muted">Max size: 10 MB per file | Format: jpeg, jpg, png |
                                Bisa pilih lebih dari satu</small>
                        </div>

                        <!-- Upload Video -->
                        <div class="mb-4" id="inputV360">
                            <label for="video" class="form-label">Upload Video Biasa</label>
                            <input type="file" class="form-control" id="video" name="video"
                                accept=".mp4">
                            <small class="form-text text-muted">Max size: 50 MB | Format: mp4 | Optional</small>
                        </div>

                        <div class="mb-4">
                            <p><strong>Pilih salah satu</strong></p>
                        </div>

                        <!-- Upload Photo 360 -->
                        <div class="mb-4" id="inputG360W">
                            <label for="gambar" class="form-label">Upload Photo 360°</label>
                            <input type="file" class="form-control" id="gambarW" name="360gambar"
                                accept=".jpeg, .jpg, .png">
                            <small class="form-text text-muted">Max size: 20 MB | Format: jpeg, jpg, png, 360, etc |
                                Optional</small>
                        </div>

                        <!-- Upload Video 360 -->
                        <div class="mb-4" id="inputV360W">
                            <label for="video" class="form-label">Upload Video 360°</label>
                            <input type="file" class="form-control" id="videoW" name="360video"
                                accept=".mp4">
                            <small class="form-text text-muted">Max size: 50 MB | Format: mp4, 360, etc | Optional</small>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary me-3 mb-4">Submit</button>
                            <button type="reset" class="btn btn-secondary mb-4" id="clearButtonW">Clear</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Home Content -->
            <div id="beranda-content" class="d-none">
                <div class="mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Home</h6>
                    <h3>Display Teks Halaman Beranda</h3>
                </div>
                <div class="container-fluid">

                    <!-- Update About Text Form -->
                    <form action="{{ route('about-post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="about-text" class="form-label">Update About Text</label>
                            <textarea class="form-control" id="text" name="text" rows="5"
                                placeholder="Masukkan teks baru untuk halaman About"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
                            {{ $about->text ?? 'No data available' }}
                        </p>
                    </div>

                    <!-- Update About Text Form -->
                    <form action="{{ route('about-post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="about-text" class="form-label">Update About Text</label>
                            <textarea class="form-control" id="text" name="text" rows="5"
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
                                Facebook: {{ $media->facebook ?? 'Tidak ada data' }}
                            </li>
                            <li class="list-group-item">
                                <i class='bx bxl-twitter text-primary me-2'></i>
                                Twitter: {{ $media->twitter ?? 'Tidak ada data' }}
                            </li>
                            <li class="list-group-item">
                                <i class='bx bxl-instagram text-danger me-2'></i>
                                Instagram: {{ $media->instagram ?? 'Tidak ada data' }} <span></span>
                            </li>
                            <li class="list-group-item">
                                <i class='bx bxl-tiktok text-dark me-2'></i>
                                TikTok: {{ $media->tiktok ?? 'Tidak ada data' }}<span></span>
                            </li>
                            <li class="list-group-item">
                                <i class='bx bxl-youtube text-danger me-2'></i>
                                Youtube: {{ $media->youtube ?? 'Tidak ada data' }}<span></span>
                            </li>
                            <li class="list-group-item">
                                <i class='bx bx-phone-call text-primary me-2'></i>
                                Telepon: {{ $media->telepon ?? 'Tidak ada data' }} <span></span>
                            </li>
                            <li class="list-group-item">
                                <i class='bx bx-envelope text-primary me-2'></i>
                                Email: {{ $media->email ?? 'Tidak ada data' }} <span></span>
                            </li>
                            <li class="list-group-item">
                                <i class='bx bx-map text-danger me-2'></i>
                                Alamat: {{ $media->alamat ?? 'Tidak ada data' }} <span></span>
                            </li>
                            <li class="list-group-item">
                                <i class='bx bxl-whatsapp text-success me-2'></i>
                                Link Chat Whatsapp: {{ $media->whatsapp ?? 'Tidak ada data' }} <span></span>
                            </li>
                        </ul>
                    </div>

                    <!-- Form to Update Social Media Links -->
                    <form action="{{ route('media-post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxl-facebook-circle text-primary'></i>
                                <label for="facebook" class="form-label ms-3">Facebook</label>
                            </div>
                            <input type="url" class="form-control" id="facebook" name="facebook"
                                placeholder="Masukkan link Facebook" value="{{ $media->facebook ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxl-twitter text-info'></i>
                                <label for="twitter" class="form-label ms-3">Twitter</label>
                            </div>
                            <input type="url" class="form-control" id="twitter" name="twitter"
                                placeholder="Masukkan link Twitter" value="{{ $media->twitter ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxl-instagram text-danger'></i>
                                <label for="instagram" class="form-label ms-3">Instagram</label>
                            </div>
                            <input type="url" class="form-control" id="instagram" name="instagram"
                                placeholder="Masukkan link Instagram" value="{{ $media->instagram ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxl-tiktok text-dark'></i>
                                <label for="tiktok" class="form-label ms-3">TikTok</label>
                            </div>
                            <input type="url" class="form-control" id="tiktok" name="tiktok"
                                placeholder="Masukkan link TikTok" value="{{ $media->tiktok ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxl-youtube text-danger'></i>
                                <label for="youtube" class="form-label ms-3">Youtube</label>
                            </div>
                            <input type="url" class="form-control" id="youtube" name="youtube"
                                placeholder="Masukkan link Youtube" value="{{ $media->youtube ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxs-phone text-success'></i>
                                <label for="telpon" class="form-label ms-3">Telepon</label>
                            </div>
                            <input type="text" class="form-control" id="telepon" name="telepon"
                                placeholder="Masukkan nomor telepon" value="{{ $media->telepon ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxs-envelope text-primary'></i>
                                <label for="email" class="form-label ms-3">Email</label>
                            </div>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan email" value="{{ $media->email ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxs-map text-danger'></i>
                                <label for="alamat" class="form-label ms-3">Alamat</label>
                            </div>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukkan alamat" value="{{ $media->alamat ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <i class='bx bxl-whatsapp text-success'></i>
                                <label for="whatsapp" class="form-label ms-3">Link Chat Whatsapp</label>
                            </div>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                placeholder="Masukkan alamat" value="{{ $media->whatsapp ?? '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Update Informasi</button>
                    </form>
                </div>
            </div>

            <!-- Input Pembayaran -->
            <div id="info-bayar" class="d-none mt-4 mb-3 pb-3">
                <div class="mt-4 mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Input Alamat Pembayaran</h6>
                    <h3>Alamat Pembayaran</h3>
                </div>

                <!-- Item Pembayaran -->
                <div class="row mb-3">
                    @foreach ($metode as $item)
                        <!-- Card 1 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $item->nama }}</h5>
                                    <span class="card-text d-block">Atas Nama : {{ $item->pemilik }}</span>
                                    <span class="card-text d-block">Nomor : {{ $item->no_rek }}</span>
                                    <div class="mt-3">
                                        <!-- Tombol Update -->
                                        <button class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal"
                                            data-bs-target="#updateModalPembayaran" data-id="{{ $item->id }}"
                                            data-name="{{ $item->nama }}" data-pemilik="{{ $item->pemilik }}"
                                            data-no_rek="{{ $item->no_rek }}">Update</button>
                                        <!-- Tombol Delete -->
                                        <button class="btn btn-danger btn-sm delete-pembayaran"
                                            data-id="{{ $item->id }}" id="deletePembayaran">Delete</button>
                                        <form id="deleteFormPembayaran-{{ $item->id }}"
                                            action="{{ route('metode-delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Card 2 -->
                </div>

                <form method="POST" action="{{ route('metode-post') }}">
                    @csrf
                    <!-- Dropdown Pilih Bank atau Wallet -->
                    <div class="form-group mb-4">
                        <label for="paymentType">Pilih Jenis Pembayaran</label>
                        <select name="jenis" class="form-control mt-2" id="paymentType" required>
                            <option value="" disabled selected>Pilih...</option>
                            <option value="bank">Bank</option>
                            <option value="wallet">Wallet</option>
                        </select>
                    </div>

                    <!-- Input Nama Bank/Wallet -->
                    <div class="form-group mb-4">
                        <label for="paymentName">Nama Bank/Wallet</label>
                        <input name="nama" type="text" class="form-control mt-2" id="paymentName"
                            placeholder="Masukkan Nama Bank atau Wallet" required>
                    </div>

                    <!-- Input Atas Nama -->
                    <div class="form-group mb-4">
                        <label for="accountName">Atas Nama</label>
                        <input name="pemilik" type="text" class="form-control mt-2" id="accountName"
                            placeholder="Masukkan Nama Pemilik" required>
                    </div>

                    <!-- Input Nomor Rekening/Wallet -->
                    <div class="form-group mb-4">
                        <label for="accountNumber">Nomor Rekening/Wallet</label>
                        <input name="no_rek" type="text" class="form-control mt-2" id="accountNumber"
                            placeholder="Masukkan Nomor Rekening atau Wallet" required>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>

            <!-- tabel Pembelian -->
            <div id="pembelian" class="d-none mt-4 mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Beli</h6>
                <h3>Pembelian</h3>
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="pesanan-table"
                                        class="table table-striped table-bordered table-hover w-100 text-center align-middle">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No HP</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function() {
                        var table = $("#pesanan-table").DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('dashboard') }}",
                            columns: [{
                                    data: "nama_produk",
                                    name: "nama_produk"
                                },
                                {
                                    data: "name",
                                    name: "name"
                                },
                                {
                                    data: "alamat",
                                    name: "alamat"
                                },
                                {
                                    data: "no_hp",
                                    name: "no_hp"
                                },
                                {
                                    data: "jumlah",
                                    name: "jumlah"
                                },
                                {
                                    data: "harga",
                                    name: "harga",
                                    render: function(data, type, row) {
                                        return 'Rp. ' + new Intl.NumberFormat('id-ID').format(data);
                                    }
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: false,
                                    searchable: false,
                                    render: function(data, type, row) {
                                        var imageUrl = "{{ asset('storage') }}/" + row
                                            .bukti_pembayaran; // Modify this as per your image path
                                        return `<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="viewImage('${imageUrl}')">View Image</button>`;
                                    }
                                }
                            ],
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    </div>
    <!--Container Main end-->

    <!-- Image Bukti Pop up -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Dynamic Image -->
                    <img id="modalImage" src="" alt="Preview" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <script>
            function viewImage(imageUrl) {
                // Set the image source in the modal
                document.getElementById('modalImage').src = imageUrl;
            }
        </script>
    </div>

    <!-- Update data Wisata Produk pop up -->
    <div class="modal fade shadow p-3" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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

                        <!-- Upload Photo -->
                        <div class="mb-4">
                            <label for="gambar" class="form-label">Upload Photos</label>
                            <input type="file" class="form-control" id="gambar" name="gambar[]"
                                accept=".jpeg, .jpg, .png" multiple required>
                            <small class="form-text text-muted">Max size: 10 MB per file | Format: jpeg, jpg, png |
                                Bisa pilih lebih dari satu</small>
                        </div>

                        <!-- Upload Video -->
                        <div class="mb-4">
                            <label for="video" class="form-label">Upload Video Biasa</label>
                            <input type="file" class="form-control" id="video" name="video"
                                accept=".mp4">
                            <small class="form-text text-muted">Max size: 50 MB | Format: mp4 | Optional</small>
                        </div>

                        <div class="mb-4">
                            <p><strong>Pilih salah satu</strong></p>
                        </div>

                        <!-- Upload Photo 360 -->
                        <div class="mb-4" class="inputG360E">
                            <label for="gambar" class="form-label">Upload Photo 360°</label>
                            <input type="file" class="form-control" id="gambarE" name="360gambar"
                                accept=".jpeg, .jpg, .png">
                            <small class="form-text text-muted">Max size: 20 MB | Format: jpeg, jpg, png, 360, etc |
                                Optional</small>
                        </div>

                        <!-- Upload Video 360-->
                        <div class="mb-4" class="inputV360E">
                            <label for="video" class="form-label">Upload Video 360°</label>
                            <input type="file" class="form-control" id="videoE" name="360video"
                                accept=".mp4">
                            <small class="form-text text-muted">Max size: 50 MB | Format: mp4, 360, etc |
                                Optional</small>
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

    <!-- Update Pembayaran pop up -->
    <div class="modal fade shadow p-3" id="updateModalPembayaran" tabindex="-1" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateFormPembayaran" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- ID (Hidden) -->
                        <input type="hidden" id="update-id" name="id">
                        <!-- Nama Pembayaran-->
                        <!-- Dropdown Pilih Bank atau Wallet -->
                        <div class="form-group mb-4">
                            <label for="paymentType">Pilih Jenis Pembayaran</label>
                            <select name="jenis" class="form-control mt-2" id="paymentType" required>
                                <option value="" disabled selected>Pilih...</option>
                                <option value="bank">Bank</option>
                                <option value="wallet">Wallet</option>
                            </select>
                        </div>

                        <!-- Input Nama Bank/Wallet -->
                        <div class="form-group mb-4">
                            <label for="paymentName">Nama Bank/Wallet</label>
                            <input name="nama" type="text" class="form-control mt-2" id="update-nama"
                                placeholder="Masukkan Nama Bank atau Wallet" required>
                        </div>

                        <!-- Input Atas Nama -->
                        <div class="form-group mb-4">
                            <label for="accountName">Atas Nama</label>
                            <input name="pemilik" type="text" class="form-control mt-2" id="update-pemilik"
                                placeholder="Masukkan Nama Pemilik" required>
                        </div>

                        <!-- Input Nomor Rekening/Wallet -->
                        <div class="form-group mb-4">
                            <label for="accountNumber">Nomor Rekening/Wallet</label>
                            <input name="no_rek" type="text" class="form-control mt-2" id="update-no_rek"
                                placeholder="Masukkan Nomor Rekening atau Wallet" required>
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
    @include('sweetalert::alert')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
