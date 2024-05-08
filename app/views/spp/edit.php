<?php include '../app/views/templates/header.php'; ?>
<div class="col-md-6">
          <div class="card card-primary">
            <div class="card-body">
              <form action="<?= urlTo('/spp/'.$data['id_spp']. '/update'); ?>" method="POST">
              <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" name="tahun" id="tahun" class="form-control"  value="<?= $data['tahun']; ?>" required>
              </div>

              <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="number" name="nominal" id="nominal" class="form-control" value="<?= $data['nominal']; ?>" required>
              </div>

              <div class="form-group">
                <a href="<?= urlTo('/spp'); ?>" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Edit Data</button>
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
<?php include '../app/views/templates/footer.php'; ?>