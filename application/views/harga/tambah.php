<div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Harga</h3>
                <form class="p-4" action="" method="post">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="0">-PILIH-</option>
                            <option value="Alat">Alat</option>
                            <option value="Bahan">Bahan</option>
                            <option value="Upah">Upah</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('kategori') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <select name="uraian" id="uraian" class="form-select">
                        </select>
                        <small class="form-text text-danger"><?= form_error('uraian') ?></small>
                        <?php
                        echo $this->session->userdata('err');
                        $this->session->unset_userdata('err');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="daerah">Daerah</label>
                        <select name="daerah" id="daerah" class="form-select">
                            <?php foreach ($daerah as $key => $daerah) { ?>
                                <option value="<?= $daerah['id']; ?>"><?= $daerah['daerah']; ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('daerah') ?></small>
                    </div>
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