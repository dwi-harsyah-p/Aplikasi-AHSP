<!-- Main -->
<div class="container col-lg-9 py-lg-3">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <?php unset($_SESSION['flash']); ?>
    <div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <h3 class="text-center"><?php echo $judul . " ";
                foreach ($daerah as $key => $value) {
                    echo $value;
                } ?></h3>          
                <table class="table table-bordered table-hover table-striped bg-light" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Uraian</th>
                            <th>Kode</th>
                            <th>Satuan</th>
                            <th>Harga Satuan (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $key => $val) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $val['uraian']; ?></td>
                                <td><?= $val['kode']; ?></td>
                                <td><?= $val['satuan']; ?></td>
                                <td><?= number_format($val['harga']); ?></td>
                            </tr>
                        <?php  }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex flex-row-reverse">
                        
                            <!-- <input class="btn btn-outline-success me-lg-2" id="print" type="submit" name="print" value="print"> -->
                        <button class="btn btn-outline-success me-lg-2" id="print" type="submit" name="print">
                            <span class="fa fa-print">
                            Print
                        </button>
                        
                    </div>
    </div>
</div>
<!--End Main -->