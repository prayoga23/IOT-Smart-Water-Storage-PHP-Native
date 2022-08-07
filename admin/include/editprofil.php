<?php
if (isset($_SESSION['id_user'])) {
  $id_user = $_SESSION['id_user'];
  $sql_d = "SELECT `nama`, `username`, `password` from `user` where `id_user` = '$id_user'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $nama = $data_d[0];
    $username = $data_d[1];
    $password = $data_d[2];
  }
} ?>

<body>
  <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
    <?php if ($_GET['notif'] == "editkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf data
        <?php echo $_GET['jenis']; ?> wajib di isi</div>
    <?php } ?>
  <?php } ?>

  <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-edit-profil" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="foto" class="col-sm-3 col-form-label">Foto </label>
      <div class="col-sm-9">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="foto" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
      <div class="col-sm-9"> <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>">
      </div>
    </div>
    <div class="form-group row"> <label for="email" class="col-sm-3 col-form-label">Email</label>
      <div class="col-sm-9"> <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>"> </div>
    </div>
    <div class="form-group row">
      <label for="username" class="col-sm-3 col-form-label" style="font-size:18px">Username</label>
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
    </div> <!-- /.card-body -->
    <div class="card-footer">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-info float-right"> <i class="flaticon-381-save"></i> Simpan</button>
      </div>
    </div> <!-- /.card-footer -->
  </form>

  </div>
  </div>
  <!-- /.card -->
  </div>
  <!-- /.content-wrapper -->

  </div>
  <!-- ./wrapper -->

  </div>
</body>

</html>