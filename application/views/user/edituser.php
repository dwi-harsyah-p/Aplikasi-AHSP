<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Edit User</h3>
                <form class="p-4" action="" method="post">
                    <div class="form-group">
                        <label for="nip">NIP/NRP</label>
                        <input readonly type="text" class="form-control" id="nip" name="nip" value="<?= $datauser['nip']; ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input readonly type="text" class="form-control" id="nama" name="nama" value="<?= $datauser['nama']; ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="role">role</label>
                        <select name="role" id="" class="form-select">
                            <?php
                            if ($datauser['nip'] != $this->session->userdata['nip']) {
                                foreach ($role as $key => $role) {
                                    if ($role['role'] == $datauser['role']) { ?>
                                        <option value="<?= $role['id']; ?>" selected><?= $role['role']; ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                                    <?php
                                    }
                                }
                            } else {
                                foreach ($role as $key => $role) {
                                    if ($role['role'] == $datauser['role']) { ?>
                                        <option value="<?= $role['id']; ?>" selected><?= $role['role']; ?></option>
                                    <?php
                                    }
                                    ?>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('role'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="active">active</label>
                        <select name="active" id="" class="form-select">
                            <?php
                            if ($datauser['nip'] != $this->session->userdata['nip']) {
                                if ($datauser['is_active'] == 1) { ?>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Not Active</option>
                                <?php } else { ?>
                                    <option value="1">Active</option>
                                    <option value="0" selected>Not Active</option>
                                <?php }
                            } else { ?>
                                <option value="1" selected>Active</option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary " type="submit" name="edit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>