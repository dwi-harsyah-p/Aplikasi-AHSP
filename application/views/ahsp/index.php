<!-- Lingkup Pekerjaan  -->
<!-- menu 1 -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <?php unset($_SESSION['flash']); ?>
    <div class="flash-delete" data-flashdata="<?= $this->session->flashdata('row') ?>"></div>
    <?php unset($_SESSION['row']); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <h3 class="text-center">AHSP</h3>
                <a href="<?= base_url('ahsp/tambah'); ?>" class="btn btn-success mb-2">+ Tambah Data</a>
                <table class="table table-bordered table-hover table-striped bg-light" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Uraian</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($ahsp as $key => $val) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $val['uraian']; ?></td>
                                <td>
                                    <form action="<?= base_url('ahsp/detail'); ?>" method="post">
                                        <input type="text" value="<?= $val['kode_lvl_4']; ?>" name="level4" id="level4" hidden>
                                        <!-- <a href="<?= base_url('ahsp/detail/') . $val['kode_lvl_4']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="color-blue bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a> -->
                                        <button type="submit" class="btn btn-primary">Go</button>
                                    </form>
                                </td>
                                <td>
                                    <a href=" <?= base_url('ahsp/edit/') . $val['kode_lvl_4']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="color-blue bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('ahsp/hapus/') . $val['kode_lvl_4']; ?>" class="tombol-hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="color-red bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></a>
                                </td>
                            </tr>
                        <?php  }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>