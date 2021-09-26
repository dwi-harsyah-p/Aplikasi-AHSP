<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <h3 class="text-center">Level 3</h3>

                        <form action="" method="post">
                            <input type="text" name="id" id="" hidden value="<?= $ahsp['id']; ?>">
                            <div class="form-group">
                                <label for="kode2">Kode Level 2</label>

                                <select name="kode2" id="kode2" class="form-select">
                                    <?php
                                    foreach ($lvl2 as $key => $data) {
                                        if ($data['kode_lvl_2'] == $ahsp['kode_lvl_2']) {
                                    ?>
                                            <option value="<?= $data['kode_lvl_2']; ?>" selected><?= $data['kode_lvl_2'] . ' ' . $data['uraian']; ?></option>
                                        <?php } else { ?>

                                            <option value="<?= $data['kode_lvl_2']; ?>"><?= $data['kode_lvl_2'] . ' ' . $data['uraian']; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('kode2') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="kode3">Kode Level 3</label>
                                <input type="text" class="form-control" id="kode3" name="kode3" value="<?= $ahsp['kode_lvl_3']; ?>" autocomplete="off">
                                <small class="form-text text-danger"><?= form_error('kode3') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" class="form-control" id="uraian" name="uraian" value="<?= $ahsp['uraian']; ?>" autocomplete="off">
                                <small class="form-text text-danger"><?= form_error('uraian') ?></small>
                            </div>
                            <button class="btn btn-primary " type="submit" name="edit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>