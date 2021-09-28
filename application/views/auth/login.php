<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
</head>

<body>
    <?= $this->session->flashdata('massage'); ?>
    <form action="" method="post">
        NIP:<input type="text" name="nip">
        <small class="form-text text-danger"><?= form_error('nip'); ?></small>
        Password: <input type="password" name="password" id="">
        <small class="form-text text-danger"><?= form_error('password'); ?></small>
        <button type="submit">Login</button>
    </form>
</body>

</html>