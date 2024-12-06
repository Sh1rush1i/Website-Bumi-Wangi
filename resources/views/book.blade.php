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
    <link href="{{ asset('css/book.css') }}" rel="stylesheet">

    <title>Admin Bumi Wangi</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card p-3">
                    <p class="mb-0 fw-bold h4">Payment Methods</p>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <!-- Nama metode pembayaran -->
                                <span class="fw-bold">Bank</span>
                                <i class="fas fa-university"></i>
                                </span>
                            </a>
                        </p>
                        <div class="collapse p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-8 mb-4">
                                    <p class="h4 mb-0">Nama Bank</p>
                                    <p class="mb-0"><span class="fw-bold">Atas Nama: </span><span class="c-green">Nama Orang</span></p>
                                    <!-- Norek -->
                                    <p class="mb-0"><span class="fw-bold">69696969696969</span>
                                </div>
                                <div class="col-8 mb-4">
                                    <p class="h4 mb-0">Nama Bank</p>
                                    <p class="mb-0"><span class="fw-bold">Atas Nama: </span><span class="c-green">Nama Orang</span></p>
                                    <!-- Norek -->
                                    <p class="mb-0"><span class="fw-bold">69696969696969</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">Digital Wallet</span>
                                <i class="fas fa-wallet"></i>
                            </a>
                        </p>
                        <div class="collapse show p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-8 mb-4">
                                    <p class="h4 mb-0">Nama Wallet</p>
                                    <p class="mb-0"><span class="fw-bold">Atas Nama: </span><span class="c-green">Nama Orang</span></p>
                                    <!-- Norek -->
                                    <p class="mb-0"><span class="fw-bold">69696969696969</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 pt-4">
                <div class="container mt-5">
                    <div class="row">
                        <!-- Form Section -->
                        <div class="col-md-6">
                            <form id="uploadForm">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" class="form-control" placeholder="Masukkan Nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea id="address" class="form-control" placeholder="Masukkan Alamat" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="tel" id="phone" class="form-control" placeholder="Masukkan Nomor Telepon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pesanan" class="form-label">Pesanan</label>
                                    <textarea id="pesanan" class="form-control" placeholder="Masukkan Pesanan" rows="5" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Bukti Pembayaran</label>
                                    <input type="file" id="image" class="form-control" accept="image/*" required>
                                </div>

                            </form>
                        </div>

                        <!-- Image Preview Section -->
                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <div id="imagePreview" class="border border-secondary rounded" style="width: 300px; height: 300px; display: flex; align-items: center; justify-content: center;">
                                <span class="text-muted">Preview Gambar</span>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary payment">
                    Upload Bukti Pembayaran
                </button>
            </div>
        </div>
    </div>

    <!-- Template Javascript -->
    <script src="{{ asset('js/book.js') }}"></script>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>