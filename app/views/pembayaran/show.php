<?php include '../app/views/templates/header.php'; $no = 1; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= urlTo('/public/img/'.$data['profil']['gambar']) ; ?>">
                </div>

                <h3 class="profile-username text-center"><?= $data['profil']['nama_siswa']; ?></h3>

                <p class="text-muted text-center"><?= $data['profil']['nama_kelas']; ?></p>

                <a href="<?= urlTo('/pembayaran'); ?>" class="btn btn-danger btn-block"><b>Kembali</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>

          <div class="col-md-8">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">

                  <li class="list-group-item">
                    <b>Spp Aktif</b> <label class="badge badge-info float-right"><?= $data['profil']['tahun'].  "(Rp. ".$data['profil']['nominal'].")" ; ?></label>
                  </li>


                  <li class="list-group-item">
                    <b>Nisn</b> <label class="badge badge-info float-right"><?= $data['profil']['nisn']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Nis</b> <label class="badge badge-info float-right"><?= $data['profil']['nis']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Kelas</b> <label class="badge badge-info float-right"><?= $data['profil']['nama_kelas']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Alamat</b> <label class="badge badge-info float-right"><?= $data['profil']['alamat_siswa']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Nomor HP</b> <label class="badge badge-info float-right"><?= $data['profil']['no_telepon_siswa']; ?></label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>




          	<div class="card card-primary card-outline">
          		<div class="card-body">
                <a href="<?= urlTo('/pembayaran/'.$data['profil']['nisn'].'/cetak'); ?>" class="btn btn-success float-left">Cetak SPP</a>
          		  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Tgl Bayar</th>
                    <th>Tahun di Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Petugas</th>
                    <th>Status/Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
<?php foreach ($data['pembayaran'] as $spp): ?>
  <tr>
    <td><?= $no++; ?></td>
    <td><?= $spp['bulan_dibayar']; ?></td>
    <td><?= $spp['tgl_bayar']; ?></td>
    <td><?= $spp['tahun_dibayar']; ?></td>
    <td><?= $spp['jumlah_bayar']; ?></td>
    <td><?= $spp['nama_petugas']; ?></td>
    <td>
      <?php if ($spp['jumlah_bayar'] === null): ?>
        <form action="<?= urlTo('/pembayaran/bayar'); ?>" method="POST" class="form-inline"> 
          <input type="number" name="jumlah_bayar" max="<?= $spp['nominal']; ?>" class="form-control" placeholder="Masukan jumlah..">
          <input type="hidden" name="id_pembayaran" value="<?= $spp['id_pembayaran']; ?>">
          <input type="hidden" name="nisn" value="<?= $_GET['nisn']; ?>">
          <button type="submit" class="btn btn-success">Bayar</button>
        </form>
        <?php elseif($spp['jumlah_bayar'] > 0 && $spp['jumlah_bayar'] < $spp['nominal']): ?>
          <form action="<?= urlTo('/pembayaran/lunas'); ?>" method="POST" class="form-inline"> 
          <input type="hidden" name="jumlah_bayar" value="<?= $spp['nominal']; ?>">
          <input type="hidden" name="id_pembayaran" value="<?= $spp['id_pembayaran']; ?>">
          <input type="hidden" name="nisn" value="<?= $_GET['nisn']; ?>">
          <button type="submit" class="btn btn-warning">Bayar lunas sisa(Rp. <?= $spp['nominal'] - $spp['jumlah_bayar']; ?>)</button>
        </form>
      <?php else: ?>
          <a class="btn btn-info">Lunas</a>
      <?php endif ?>
    </td>
  </tr>
<?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Tgl Bayar</th>
                    <th>Tahun di Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Petugas</th>
                    <th>Status/Tindakan</th>
                  </tr>
                  </tfoot>
                </table>
          		</div>
          	</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
<?php include '../app/views/templates/footer.php'; ?>