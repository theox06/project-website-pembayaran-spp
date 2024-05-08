<?php include '../app/views/templates/header.php'; ?>
<div class="container-fluid">
	<div class="card-card-primary card-outline">
		<div class="card-header">
			<form action="<?= urlTo('/pembayaran/show'); ?>" method="GET" class="form-inline">
				<input type="number" name="nisn" class="form-control" placeholder="Masukkan nisn..." required>
				<button type="submit" class="btn btn-primary">Cari Siswa</button>
			</form>
		</div>
	</div>
</div>
<?php include '../app/views/templates/footer.php'; ?>