<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Edit Biodata User</h3><br>
                <img src="<?= base_url('assets/img/profile/') . $datauser['image']; ?>" class="mx-auto d-block img-thumbnail" alt="User Foto" width="120px">
                <form action="" method="POST" class="px-3 mt-2" enctype="multipart/form-data">
                    <input type="text" name="nipcek" id="" hidden value="<?= $datauser['nip']; ?>">
                    <div class="form-group m-0">
                        <label for="profilePhoto" name="image" id="profilePhoto" class="m-1">Upload Foto Profile</label>
                        <input type="file" name="image" id=image>
                    </div>
                    <div class="form-group m-0">
                        <label for="nip" name="nip" class="m-1">NIP/NRP </label>
                        <input type="text" name="nip" id="nip" class="form-control" value="<?= $datauser['nip']; ?>">
                        <small class="form-text text-danger"><?= form_error('nip'); ?></small>
                    </div>
                    <div class="form-group m-0">
                        <label for="nama" name="nama" class="m-1">Nama </label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $datauser['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group m-0">
                        <label for="ttl" class="m-1">Tanggal Lahir</label>
                        <input id="ttl" type="date" name="ttl" value="<?= $datauser['tgl_lahir']; ?>" class="form-control">
                        <small class="form-text text-danger"><?= form_error('ttl'); ?></small>
                    </div>
                    <div class="form-group m-0">
                        <label for="gender" class="m-1">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control">
                            <?php if ($datauser['jenis_kelamin'] == 'Laki-laki') { ?>
                                <option value="Laki-laki" selected>Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            <?php } elseif ($datauser['jenis_kelamin'] == 'Perempuan') { ?>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan" selected>Perempuan</option>
                            <?php } else { ?>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('gender'); ?></small>
                    </div>
                    <div class="form-group m-0">
                        <label for="alamat" name="alamat" class="m-1">Alamat </label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $datauser['alamat']; ?>">
                        <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                    <div class="form-group m-0">
                        <label for="daerah">Daerah</label>
                        <select name="daerah" id="" class="form-select">
                            <?php
                            foreach ($daerah as $key => $daerah) {
                                if ($daerah['id'] == $datauser['id_daerah']) { ?>
                                    <option value="<?= $daerah['id']; ?>" selected><?= $daerah['daerah']; ?></option>
                                <?php } else { ?>
                                    <option value="<?= $daerah['id']; ?>"><?= $daerah['daerah']; ?></option>
                            <?php }
                            } ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('daerah') ?></small>
                    </div>
                    <div class="form-group m-0">
                        <label for="phone" name="name" class="m-1">No. Telp</label>
                        <input type="tel" name="phone" id="iphone" class="form-control" value="<?= $datauser['no_telp']; ?>">
                        <small class="form-text text-danger"><?= form_error('phone'); ?></small>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary " type="submit" name="edit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>