<div class="flash-passpesan" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<?php unset($_SESSION['msg']); ?>
<div class="flash-pass" data-flashdata="<?= $this->session->flashdata('pass') ?>"></div>
<?php unset($_SESSION['pass']); ?>
<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Change Password</h3>
                <form class="p-4" action="" method="post">
                    <div class="form-group">
                        <label for="password">Currrent Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('password') ?></small>
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