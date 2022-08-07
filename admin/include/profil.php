<?php
if (isset($_SESSION['id_user'])) {
  $id_user = $_SESSION['id_user'];
  $sql_d = "SELECT `nama`, `username`, `password` from `user` where `id_user` = '$id_user'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_p = mysqli_fetch_row($query_d)) {
    $nama = $data_p[0];
    $username = $data_p[1];
    $password = $data_p[2];
  }
} ?>
<div class="content-body">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-6">
        <div class="card">
        <?php if (!empty($_GET['notif'])) {
            if ($_GET['notif'] == "editberhasil") { ?>
              <div class="alert alert-success" role="alert"> Data Berhasil Diubah</div> <?php } ?> <?php } ?>
          <div class="card-header">
            Email : <?php echo $email; ?>
          </div>
          <div class="container">
            <div class="card" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                
                  <img class="card-img" src="foto/<?php echo $foto; ?>" width="100%">

                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $nama; ?></h5>
                    <p class="card-text">Username : <small class="text-muted"><?php echo $username; ?> </small>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Edit Profile
          </div>
          <div class="card-body">
          <?php include("include/editprofil.php") ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>