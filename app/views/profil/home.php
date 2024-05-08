<?php include '../app/views/templates/header.php'; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= urlTo('/public/img/'.$data['gambar']); ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $data['nama_petugas']; ?></h3>

                <p class="text-muted text-center"><?= $data['level']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Alamat</b> <label class="badge badge-info float-right"><?= $data['alamat_petugas']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Nomor HP</b> <label class="badge badge-info float-right"><?= $data['no_hp_petugas']; ?></label>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Foto Profil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ganti Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="profil">
                    <form action="<?= urlTo('/profil/foto'); ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="gambar" class="custom-file-input" id="gambar" required>
                            <label class="custom-file-label" for="gambar">Pilih gambar</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-primary">Ganti Foto Profil</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?= urlTo('/profil/password'); ?>" method="post">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="password-lama" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                          <input type="password" name="password-lama" class="form-control" id="password-lama" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password-baru" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password-baru" id="password-baru" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="konfirmasi-password-baru" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="konfirmasi-password-baru" id="konfirmasi-password-baru" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Ganti Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
<?php include '../app/views/templates/footer.php'; ?>