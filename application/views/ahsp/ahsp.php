    <!-- Main -->
    <!-- Cari Jenis Pekerjaan -->
    <div class="container col-lg-7 py-lg-3">
        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                Cari Jenis Pekerjaan
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mb-lg-3 px-lg-5 mx-auto">
                        <div class="col-lg-4">
                            <label class="form-label">Kode Kelompok Pekerjaan</label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-select" aria-label="Default select example" name="level3" id="level3">
                                <option value="">-PILIH-</option>
                                <?php
                                foreach ($ahsp3 as $key => $val) { ?>
                                    <option value="<?= $val['kode_lvl_3']; ?>"><?= $val['kode_lvl_3'] . ' ' . $val['uraian']; ?></option>
                                <?php } ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('level3') ?></small>
                        </div>
                    </div>
                    <div class="row mb-lg-3 px-lg-5 mx-auto">
                        <div class="col-lg-4">
                            <label class="form-label">Kode Jenis Pekerjaan</label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-select" name="level4" id="level4" aria-label="Default select example">
                            </select>
                            <small class="form-text text-danger"><?= form_error('level4') ?></small>
                        </div>
                    </div>
                    <div class="row mt-lg-4">
                        <button class="btn btn-primary ms-auto" type="submit" name="cari">Lihat Harga</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Cari Jenis Pekerjaan -->

    <!-- Hasil Search -->
    <div class="container col-lg-9 py-lg-3">
        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                Yang Dibutuhkan
            </div>
            <div class="card-body">
                <h5 class="text-center"><?= $ahsp4['uraian']; ?></h5>
                <ol type="A" class="mx-lg-5">
                    <!-- Tenaga -->
                    <li class="fw-bold">Tenaga</li>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($upah as $key => $value) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <?= $value['uraian']; ?>
                                        <a data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" title="Kode : <?= $value['kode']; ?> <br> Satuan : <?= $value['satuan']; ?> <br> Koefisien : <?= $value['koefesien']; ?> <br> Harga : <?= number_format($value['harga']); ?>">
                                            <span class="badge bg-primary rounded-pill">i</span></a>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php
                                        echo 'RP' . number_format(($value['koefesien'] * $value['harga']) + $value['harga']); ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <!-- jumlah -->
                        <li class="list-group-item fw-bold mb-lg-3">
                            <div class="row">
                                <div class="col-lg-8">
                                    Jumlah
                                </div>
                                <div class="col-lg-4">
                                    <?php foreach ($total_upah as $key => $value) {
                                        echo 'Rp' . number_format($value);
                                    } ?>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- Bahan -->
                    <li class="fw-bold">Bahan</li>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($bahan as $key => $value) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <?= $value['uraian']; ?>
                                        <a data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" title="Kode : <?= $value['kode']; ?> <br> Satuan : <?= $value['satuan']; ?> <br> Koefisien : <?= $value['koefesien']; ?> <br> Harga : <?= number_format($value['harga']); ?>">
                                            <span class="badge bg-primary rounded-pill">i</span></a>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= 'RP' . number_format(($value['koefesien'] * $value['harga']) + $value['harga']); ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <!-- jumlah -->
                        <li class="list-group-item fw-bold mb-lg-3">
                            <div class="row">
                                <div class="col-lg-8">
                                    Jumlah
                                </div>
                                <div class="col-lg-4">
                                    <?php foreach ($total_bahan as $key => $value) {
                                        echo 'Rp' . number_format($value);
                                    } ?>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- Peralatan -->
                    <li class="fw-bold">Peralatan</li>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($alat as $key => $value) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <?= $value['uraian']; ?>
                                        <a data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right" title="Kode : <?= $value['kode']; ?> <br> Satuan : <?= $value['satuan']; ?> <br> Koefisien : <?= $value['koefesien']; ?> <br> Harga : <?= number_format($value['harga']); ?>">
                                            <span class="badge bg-primary rounded-pill">i</span></a>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= 'RP' . number_format(($value['koefesien'] * $value['harga']) + $value['harga']); ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <!-- jumlah -->
                        <li class="list-group-item fw-bold mb-lg-3">
                            <div class="row">
                                <div class="col-lg-8">
                                    Jumlah
                                </div>
                                <div class="col-lg-4">
                                    <?php foreach ($total_alat as $key => $value) {
                                        echo 'Rp' . number_format($value);
                                    } ?>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- Jumlah -->
                    <div class="d-flex row fw-bold mx-lg-1 mb-lg-3">
                        <li class="col-lg-8">Jumlah</li>
                        <div class="col-lg-4"><?php
                                                $totalalat = 0;
                                                $totalbahan = 0;
                                                $totalupah = 0;
                                                $total = 0;
                                                foreach ($total_alat as $key => $value) {
                                                    $totalalat = $value;
                                                }
                                                foreach ($total_bahan as $key => $value) {
                                                    $totalbahan = $value;
                                                }
                                                foreach ($total_upah as $key => $value) {
                                                    $totalupah = $value;
                                                }
                                                $total = $totalalat + $totalbahan + $totalupah;
                                                echo 'Rp' . number_format($total); ?></div>
                    </div>

                    <!-- Overhead & Profit -->
                    <div class="d-flex row fw-bold mx-lg-1 mb-lg-3">
                        <li class="col-lg-8">Overhead & Profit</li>
                        <div class="col-lg-4"><?php
                                                $profit = 0;
                                                $profit = $total * 0.1;
                                                echo 'Rp' . number_format($profit);
                                                ?></div>
                    </div>

                    <!-- Harga Satuan Pekerjaan -->
                    <div class="d-flex row fw-bold mx-lg-1 mb-lg-3">
                        <li class=" col-lg-8">Harga Satuan Pekerjaan</li>
                        <div class="col-lg-4"><?php
                                                $jumlah = $total + $profit;
                                                echo 'Rp' . number_format($jumlah);
                                                ?></div>
                    </div>

                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-outline-success me-lg-2">
                            <span class="fa fa-print" />
                            Print
                        </button>
                        <button class="btn btn-outline-success me-lg-2">
                            <span class="fa fa-print" />
                            Cari Pekerjaan Lain
                        </button>
                    </div>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Hasil Search -->
    <!-- End Main -->