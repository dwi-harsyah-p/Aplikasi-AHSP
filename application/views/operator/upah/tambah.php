<div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="container col-lg-9 py-lg-3">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Tambah Data Upah</h3>
                <form class="p-4" action="" method="post">
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <select name="upah" id="upah" class="form-select">
                            <?php foreach ($upah as $key => $upah) { ?>
                                <option value="<?= $upah['id']; ?>"><?= $upah['uraian']; ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('upah') ?></small>
                        <?php
                        echo $this->session->userdata('err');
                        $this->session->unset_userdata('err');
                        ?>
                    </div>
                    <input type="number" class="form-control" id="daerah" name="daerah" value="<?= $user['id_daerah']; ?>" autocomplete="off" hidden>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= set_value('harga'); ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('harga') ?></small>
                    </div>
                    <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>