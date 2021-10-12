<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Upah</h3>
                <form class="p-4" action="" method="post">
                    <input type="text" name="id" id="" hidden value="<?= $upah['id']; ?>">
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <input type="text" class="form-control" id="uraian" name="uraian" value="<?= $upah['uraian']; ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('uraian') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $upah['satuan']; ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('satuan') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Satuan (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $upah['harga']; ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('harga') ?></small>
                    </div>
                    <button class="btn btn-primary " type="submit" name="edit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>