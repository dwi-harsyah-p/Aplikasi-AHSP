<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">

    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

 
<body>
 
    <div id="content-wrapper" class="d-flex flex-column">
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
                            <a class="nav-link" href="<?= base_url('ahsp/detail'); ?>">
                                AHSP
                            </a>
                        </li>
                        <li class="nav-item dropdown me-lg-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Daftar Harga Satuan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('operator/alat'); ?>">
                                        <i class="fas fa-wrench fa-sm fa-fw mr-2 text-gray-400"></i>Alat
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('operator/bahan'); ?>">
                                    <i class="fas fa-building fa-sm fa-fw mr-2 text-gray-400"></i>Bahan
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('operator/upah'); ?>">
                                    <i class="fas fa-male fa-sm fa-fw mr-2 text-gray-400"></i>Upah
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class=""><?php
                                                                                            $nama = explode(' ', trim($user['nama']));
                                                                                            echo $nama[0]; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="30px" height="30px">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a href="<?= base_url('operator/profile'); ?>" class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a href="<?= base_url('operator/changepassword'); ?>" class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->