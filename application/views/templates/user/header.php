<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="sticky-top navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="d-flex navbar-brand" href="<?= base_url('operator'); ?>">
                <div class="logo">
                    <img src="<?= base_url('assets/'); ?>img/Logo_PU.jpg" width="70" class="align-text-top">
                </div>
                <div class="logo-text m-2">
                    <h5>Analisis Harga Satuan Pekerjaan</h5>
                    <p class="fs-6">Balai Besar Wilayah Sungai Sumateran VIII</p>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown me-lg-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Daftar Harga Satuan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('operator/bahan'); ?>">Bahan</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('operator/upah'); ?>">Upah</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('operator/alat'); ?>">Alat</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="nav-link text-reset" href="#">
                    <span class="fa fa-user-tie fa-2x"></span>
                </a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->