<?php
include("../koneksi/koneksi.php");
$auto = mysqli_query($koneksi, "select max(nama_jenis_tandon) as id_tandon from tandon");
$data = mysqli_fetch_array($auto);

$auto = $data['id_tandon'];
$urutan = (int)substr($kode, 1, 3);
$urutan++;
$huruf = "Water Tank";
$nama_jenis_tandon = $huruf . sprintf("%03s", $urutan);

?>

<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
          <h4>Tambah Tandon</h4>
        </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Tandon</a></li>
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Tandon</a></li>
        </ol>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="row">
      <div class="col-xl-12 col-xxl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tambah Tandon</h4>
            <a href="index.php?include=tandon" class="btn btn-danger">Kembali</a>
          </div> <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
            <?php if ($_GET['notif'] == 'tambahkosong') { ?>
              <div class="alert alert-danger" role="alert">Maaf data <?php echo $_GET['jenis']; ?> wajib di isi</div>
          <?php }
                  } ?>
          <div class="card-body">

            <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-tandon">
              <div class="form-group row">
                <label for="nama_jenis_tandon" class="col-sm-3 col-form-label">Nama Jenis Tandon</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" required="required" name="nama_jenis_tandon" id="nama_jenis_tandon" value="<?php echo $nama_jenis_tandon; ?>">
                </div>
              </div>
              <button type="submit" class="btn btn-info float-right" name="tambahtandon"><i class="flaticon-381-plus"></i>Tambah</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>