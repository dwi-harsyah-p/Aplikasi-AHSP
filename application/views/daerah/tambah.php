<div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Daerah</h3>
                <form class="p-4" action="" method="post">
                    <div class="form-group">
                        <label for="daerah">Daerah</label>
                        <input type="text" class="form-control" id="daerah" name="daerah" value="<?= set_value('daerah'); ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('daerah') ?></small>
                    </div>
                    <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>