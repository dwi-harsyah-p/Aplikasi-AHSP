  <!-- Dashboard Content -->
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-10">
              <div class="card rounded-0 mt-3 border-primary">
                  <div class="card-header border-primary">
                      <ul class="nav nav-tabs card-header-tabs">
                          <li class="nav-item">
                              <a href="#profile" class="nav-link active font-weight-bold" data-toggle="tab">Profile</a>
                          </li>

                          <li class="nav-item">
                              <a href="#editProfile" class="nav-link  font-weight-bold" data-toggle="tab">Edit Profile</a>
                          </li>
                      </ul>
                  </div>

                  <div class="card-body">
                      <div class="tab-content">
                          <div class="tab-pane container active" id="profile">
                              <div class="card-deck">
                                  <div class="card border-primary">
                                      <div class="card-harder bg-primary text-light text-center lead">
                                          User
                                      </div>
                                      <div class="card-body center">
                                          <div class="text-center">
                                              <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="" width="150px">
                                          </div>
                                          <p class="card-text p-2 m-1 rounded" style="border-bottom:1px solid #0275d8 ">NIP: <?= $user['nip']; ?> </p>
                                          <p class="card-text p-2 m-1 rounded" style="border-bottom:1px solid #0275d8 ">Nama: <?= $user['nama']; ?></p>
                                          <p class="card-text p-2 m-1 rounded" style="border-bottom:1px solid #0275d8 ">Tanggal Lahir: <?= date('d F Y', strtotime($user['tgl_lahir'])); ?></p>
                                          <p class="card-text p-2 m-1 rounded" style="border-bottom:1px solid #0275d8 ">Jenis Kelamin: <?= $user['jenis_kelamin']; ?></p>
                                          <p class="card-text p-2 m-1 rounded" style="border-bottom:1px solid #0275d8 ">Alamat: <?= $user['alamat']; ?></p>
                                          <p class="card-text p-2 m-1 rounded" style="border-bottom:1px solid #0275d8 ">No. Telp: <?= $user['no_telp']; ?></p>

                                          <div class="clearfix"></div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Profile content end -->

                          <!-- Edit content start -->
                          <div class="tab-pane container fade" id="editProfile">
                              <div class="card-deck">
                                  <div class="card border-primary">
                                      <form action="<?= base_url('user') ?>" method="POST" class="px-3 mt-2" enctype="multipart/form-data">
                                          <!-- <input type="hidden" name="oldimage" value=""> -->
                                          <div class="form-group m-0">
                                              <label for="profilePhoto" name="image" id="profilePhoto" class="m-1">Upload Profile Picture</label>
                                              <input type="file" name="image" id=image>
                                          </div>
                                          <div class="form-group m-0">
                                              <label for="profilePhoto" name="nama" class="m-1">Nama </label>
                                              <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>">
                                              <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                          </div>
                                          <div class="form-group m-0">
                                              <label for="ttl" class="m-1">Tanggal Lahir</label>
                                              <input id="ttl" type="date" name="ttl" value="<?= $user['tgl_lahir']; ?>" class="form-control">
                                              <small class="form-text text-danger"><?= form_error('ttl'); ?></small>
                                          </div>
                                          <div class="form-group m-0">
                                              <label for="gender" class="m-1">Jenis Kelamin</label>
                                              <select name="gender" id="gender" class="form-control">
                                                  <!-- <option value="" disabled selected>Select</option> -->
                                                  <option value="Laki-laki">Laki-Laki</option>
                                                  <option value="Perempuan">Perempuan</option>
                                              </select>
                                              <small class="form-text text-danger"><?= form_error('gender'); ?></small>
                                          </div>

                                          <div class="form-group m-0">
                                              <label for="profilePhoto" name="alamat" class="m-1">Alamat </label>
                                              <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $user['alamat']; ?>">
                                              <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                          </div>
                                          <div class="form-group m-0">
                                              <label for="phone" name="name" class="m-1">No. Telp</label>
                                              <input type="tel" name="phone" id="iphone" class="form-control" value="<?= $user['no_telp']; ?>">
                                              <small class="form-text text-danger"><?= form_error('phone'); ?></small>
                                          </div>
                                          <div class="form-group mt-2">
                                              <!-- <input type="submit" name="profile_update" value="Update Profile " class=" btn-success btn-block" id="profileUpdateBtn"> -->
                                              <button class=" btn-success btn-block" type="submit">Update Profile</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                          <!-- Edit content end -->

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Dashboard Content -->