<div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">AHSP</h3>
                <form class="p-4" action="" method="post">
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <select name="uraian" id="uraian" class="form-select">
                            <?php
                            foreach ($ahsp4 as $key => $val) { ?>
                                <option value="<?= $val['kode_lvl_4']; ?>"><?= $val['uraian']; ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('uraian') ?></small>
                    </div>

                    <div class="form-group" id="dynamic_fieldalat">
                        <label for="kode">Alat</label>
                        <select name="id_alat[]" id="alat1" class="">
                            <?php
                            foreach ($alat as $key => $val) { ?>
                                <option value="<?= $val['id']; ?>"><?= $val['uraian']; ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" class="" id="koe_alat1" name="koe_alat[]" placeholder="Koefesien" autocomplete="off" required>
                        <small class="form-text text-danger"><?= form_error('koe_alat') ?></small>
                    </div>
                    <div class="form-group">
                        <button type="button" name="addalat" id="addalat" class="btn btn-success">Add More</button>
                    </div>

                    <div class="form-group" id="dynamic_fieldbahan">
                        <label for="satuan">Bahan</label>
                        <select name="id_bahan[]" id="bahan1" class="">
                            <?php
                            foreach ($bahan as $key => $val) { ?>
                                <option value="<?= $val['id']; ?>"><?= $val['uraian']; ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" class="" id="koe_bahan1" name="koe_bahan[]" placeholder="Koefesien" autocomplete="off" required>
                        <small class="form-text text-danger"><?= form_error('koe_bahan') ?></small>
                    </div>
                    <div class="form-group">
                        <button type="button" name="addbahan" id="addbahan" class="btn btn-success">Add More</button>
                    </div>

                    <div class="form-group" id="dynamic_fieldupah">
                        <label for="satuan">Tenaga</label>
                        <select name="id_upah[]" id="upah1" class="">
                            <?php
                            foreach ($upah as $key => $val) { ?>
                                <option value="<?= $val['id']; ?>"><?= $val['uraian']; ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" class="" id="koe_upah1" name="koe_upah[]" placeholder="Koefesien" autocomplete="off" required>
                        <small class="form-text text-danger"><?= form_error('koe_upah') ?></small>
                    </div>
                    <div class="form-group">
                        <button type="button" name="addupah" id="addupah" class="btn btn-success">Add More</button>
                    </div>

                    <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>