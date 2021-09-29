<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Level 4</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kode3">Kode Level 3</label>
                        <select name="kode3" id="kode3" class="form-select">
                            <?php
                            foreach ($ahsp as $key => $data) { ?>
                                <option value="<?= $data['kode_lvl_3'] ?>"><?= $data['kode_lvl_3'] . ' ' . $data['uraian'] ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('kode3') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="kode4">Kode Level 4</label>
                        <input type="text" class="form-control" id="kode4" name="kode4" value="<?= set_value('kode4'); ?>" autocomplete="off">
                        <?php if (form_error('kode4')) { ?>
                            <small class="form-text text-danger"><?= form_error('kode4') ?></small>
                        <?php } else {
                            echo $this->session->userdata('err');
                            $this->session->unset_userdata('err');
                        } ?>
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