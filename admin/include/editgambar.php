<?php
if (isset($_GET['data'])) {
	$id = $_GET['data'];
	$_SESSION['id'] = $id;
	//get logobrand
	$sql_m = "SELECT `nama_perusahaan`,`gambar_perusahaan` FROM `logobrand` WHERE `id`='$id'";
	$query_m = mysqli_query($koneksi, $sql_m);
	while ($data_m = mysqli_fetch_row($query_m)) {
		$nama_perusahaan = $data_m[0];
		$gambar_perusahaan = $data_m[1];
	}
}
?>
<!-- Content Header (Page header) -->
<!-- Main content -->

<div class="content-body">

	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4>Edit logo</h4>
			</div>
		</div>
		<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">logo</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Edit logo</a></li>
			</ol>
		</div>
	</div>

	<!-- /.card-header -->
	<!-- form start -->
	<div class="row">
		<div class="col-xl-12 col-xxl-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit logo</h4>
				</div> <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
					<?php if ($_GET['notif'] == 'tambahkosong') { ?>
						<div class="alert alert-danger" role="alert">Maaf data <?php echo $_GET['jenis']; ?> wajib di isi</div>
				<?php }
						} ?>
				<div class="card-body">
					<form action="index.php?include=konfirmasi-edit-gambar" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<label class="form-label">Nama Perusahaan</label>
							<input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $nama_perusahaan ?>">
							<input type="hidden" name="id" class="form-control" value="<?php echo $nama_perusahaan ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">Gambar Perusahaan</label>
							<input type="file" name="gambar_perusahaan" class="form-control">


							<img src="foto/<?php echo $gambar_perusahaan ?>" style="width:200px;">
						</div>


						<div class="mb-3">
							<button class="btn btn-success" type="submit">Submit</button>
							<a href="index.php?include=logobrand" class="btn btn-danger">Kembali</a>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>

</html>