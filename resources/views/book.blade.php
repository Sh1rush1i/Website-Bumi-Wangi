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
                <h3>Ini formnya di sini ntar</h3>
                <button class="btn btn-primary payment">
                    Make Payment
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>