<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <h3 class="text-center">Level 1</h3>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="kode1">Kode</label>
                                <input type="text" class="form-control" id="kode1" name="kode1" value="<?= set_value('kode1'); ?>" autocomplete="off">
                                <small class="form-text text-danger"><?= form_error('kode1') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="divisi">Divisi</label>
                                <input type="text" class="form-control" id="divisi" name="divisi" value="<?= set_value('divisi'); ?>" autocomplete="off">
                                <small class="form-text text-danger"><?= form_error('divisi') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" class="form-control" id="uraian" name="uraian" value="<?= set_value('uraian'); ?>" autocomplete="off">
                                <small class="form-text text-danger"><?= form_error('uraian') ?></small>
                            </div>
                            <button class="btn btn-primary " type="submit" name="tambah">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>