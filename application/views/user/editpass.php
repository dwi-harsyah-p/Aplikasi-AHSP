<div class="flash-passpesan" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="flash-pass" data-flashdata="<?= $this->session->flashdata('pass') ?>"></div>
<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Edit Password User</h3>
                <form class="p-4" action="" method="post">
                    <div class="form-group">
                        <label for="nip">NIP/NRP</label>
                        <input type="nip" class="form-control" id="nip" name="nip" autocomplete="off" readonly value="<?= $user['nip']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" class="form-control" id="nama" name="nama" autocomplete="off" readonly value="<?= $user['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New Password</label>
                        <input type="password" class="form-control" id="newpassword" name="newpassword" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('newpassword') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="confpass">Confirm New Password</label>
                        <input type="password" class="form-control" id="confpass" name="confpass" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('confpass') ?></small>
                    </div>
                    <button class="btn btn-primary" type="submit" name="ubah">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>