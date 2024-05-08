<?php include '../app/views/templates/header.php'; ?>
<div class="col-md-6">
          <div class="card card-primary">
            <div class="card-body">
            	<form action="<?= urlTo('/kelas/'.$data['id_kelas'].'/update'); ?>" method="POST">
              <div class="form-group">
                <label for="nama_kelas">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="<?= $data['nama_kelas'] ?>" required>
              </div>

              <div class="form-group">
                <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control" value="<?= $data['kompetensi_keahlian'] ?>" required>
              </div>

              <div class="form-group">
                <a href="<?= urlTo('/kelas'); ?>" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Edit Data</button>
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
<?php include '../app/views/templates/footer.php'; ?>