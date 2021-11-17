<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Tambah User</h3>
                <form class="p-4" action="" method="post">
                    <div class="form-group">
                        <label for="nip">NIP/NRP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip'); ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('nip') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('password') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="daerah">Daerah</label>
                        <select name="daerah" id="daerah" class="form-select">
                            <?php
                            foreach ($daerah as $key => $daerah) {
                            ?>
                                <option value="<?= $daerah['id']; ?>"><?= $daerah['daerah']; ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('daerah') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="role">role</label>
                        <select name="role" id="" class="form-select">
                            <?php
                            foreach ($role as $key => $role) {
                            ?>
                                <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('role') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="active">Active</label>
                        <select name="active" id="" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('active') ?></small>
                    </div>
                    <button class="btn btn-primary " type="submit" name="tambah">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>