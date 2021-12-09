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
                            <select class="form-select" aria-label="Default select example" id="level3">
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
                        <button class="btn btn-primary ms-auto" type="submit">Lihat Harga</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Cari Jenis Pekerjaan -->
    <!-- End Main -->