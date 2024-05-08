<?php include '../app/views/templates/header.php'; ?>
<div class="col-md-6">
          <div class="card card-primary">
            <div class="card-body">
              <form action="<?= urlTo('/petugas/'.$data['id_users']. '/update'); ?>" method="POST">
              <div class="form-group">
                <label for="level">Level</label>
                <select id="level" name="level" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option <?= $data['level'] == 'Admin' ? 'selected' : ''; ?> value="1" selected>Admin</option>
                  <option <?= $data['level'] == 'Petugas' ? 'selected' : ''; ?> value="2">Petugas</option>
                </select>
              </div>

              <div class="form-group">
                <a href="<?= urlTo('/petugas'); ?>" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Edit Data</button>
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
<?php include '../app/views/templates/footer.php'; ?>