<?php
//session_start();
//include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
  $id_user = $_GET['data'];
  $_SESSION['id_user'] = $id_user;
  //get data user
  $sql_c = "SELECT `nama`, `email`,`username`,`password`,`level` FROM `user` WHERE `id_user`='$id_user'";

  $query_c = mysqli_query($koneksi, $sql_c);
  while ($data_c =  mysqli_fetch_row($query_c)) {
    $nama = $data_c[0];
    $email = $data_c[1];
    $username = $data_c[2];
    $password = $data_c[3];
    $level = $data_c[4];
  }
}
?>


<!-- Content Header (Page header) -->
<!-- Main content -->

<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
          <h4>Edit User</h4>
        </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
        </ol>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="row">
      <div class="col-xl-12 col-xxl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Edit User</h4>
            <a href="index.php?include=user" class="btn btn-danger">Kembali</a>
          </div> <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
            <?php if ($_GET['notif'] == 'tambahkosong') { ?>
              <div class="alert alert-danger" role="alert">Maaf data <?php echo $_GET['jenis']; ?> wajib di isi</div>
          <?php }
                  } ?>
          <div class="card-body">

            <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-edit-user" enctype="multipart/form-data">
              <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                <div class="col-sm-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" name="password" id="password" value="">
                  <span class="text-danger" style="font-weight:lighter;font-size:12px">
                    *Jangan diisi jika tidak ingin mengubah password</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label">Level</label>
                <div class="col-sm-7">
                  <select class="form-control" id="jurusan" name="level">
                    <option value="Superadmin" <?php if ($level == "Superadmin") { ?>selected <?php } ?>>Superadmin</option>
                    <option value="User" <?php if ($level == "User") { ?> selected <?php } ?>>User</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-info float-right"><i class="flaticon-381-save"></i> Simpan</button>
          </div>
        </div>

      </div>
      <!-- /.card-body -->
      <!-- <div class="card-footer">
          <div class="col-sm-12">

          </div>
        </div> -->
      <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>