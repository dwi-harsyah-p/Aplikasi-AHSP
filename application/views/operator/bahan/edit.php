<div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="container col-lg-9 py-lg-3">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Ubah Harga Bahan</h3>
                <form class="p-4" action="" method="post">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $harga['id']; ?>" autocomplete="off" hidden>
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <input type="text" class="form-control" id="bahan" name="bahan" value="<?= $harga['uraian']; ?>" autocomplete="off" readonly>
                        <small class="form-text text-danger"><?= form_error('bahan') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $harga['harga']; ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('harga') ?></small>
                    </div>
                    <button class="btn btn-primary" type="submit" name="edit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>