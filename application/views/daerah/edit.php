<div class="container">
    <div class="m-auto">
        <div class="card shadow mb-4">
            <div class="card-body col-lg-7 m-auto">
                <h3 class="text-center">Daerah</h3>
                <form class="p-4" action="" method="post">
                    <input type="text" name="id" id="" hidden value="<?= $daerah['id']; ?>">
                    <div class="form-group">
                        <label for="daerah">Daerah</label>
                        <input type="text" class="form-control" id="daerah" name="daerah" value="<?= $daerah['daerah']; ?>" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('daerah') ?></small>
                    </div>
                    <button class="btn btn-primary " type="submit" name="edit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>