<!-- Main content -->
<div class="content-body">
	<div class="container-fluid">
		<div class="row page-titles mx-0">
			<div class="col-sm-6 p-md-0">
				<div class="welcome-text">
					<h4>Tambah logo</h4>
				</div>
			</div>
			<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">logo</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah logo</a></li>
				</ol>
			</div>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<div class="row">
			<div class="col-xl-12 col-xxl-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Tambah logo</h4>
						<a href="index.php?include=logobrand" class="btn btn-danger">Kembali</a>
					</div> <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
						<?php if ($_GET['notif'] == 'tambahkosong') { ?>
							<div class="alert alert-danger" role="alert">Maaf data <?php echo $_GET['jenis']; ?> wajib di isi</div>
					<?php }
							} ?>
					<div class="card-body">

						<form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-gambar" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="gambar_perusahaan" class="col-sm-3 col-form-label">Logo Perusahaan </label>
								<div class="col-sm-7">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="gambar_perusahaan" id="customFile">
										<label class="custom-file-label" for="customFile">Choose file</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_perusahaan" class="col-sm-3 col-form-label">Nama Perusahaan</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="">
								</div>
							</div>
							<button type="submit" class="btn btn-info float-right" name="tambahgambar"><i class="flaticon-381-plus"></i> Tambah</button>
					</div>
				</div>

			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<div class="col-sm-12">

				</div>
			</div>
			<!-- /.card-footer -->
			</form>
		</div>
		<!-- /.card -->

		</section>