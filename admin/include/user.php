<?php
//  include('koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_user = $_GET['data'];
    //hapus kategori buku
    $sql_dh = "delete from `user` where `id_user` = '$id_user'";
    mysqli_query($koneksi, $sql_dh);
  }
}
if (isset($_POST["katakunci"])) {
  $katakunci_user = $_POST["katakunci"];
  $_SESSION['katakunci_user'] = $katakunci_user;
}
if (isset($_SESSION['katakunci_user'])) {
  $katakunci_user = $_SESSION['katakunci_user'];
}
?>

<!-- Content Header (Page header) -->

<!-- Main content -->

<!-- /.card-header -->
<!-- <div class="card-body">
      <div class="col-md-12">

          </div>.row -->
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
          <h4>Management User</h4>

        </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Management User</a></li>
        </ol>
      </div>
    </div>
    <!-- row -->

    <!-- </form>
      </div><br> -->
    <div class="row">
      <div class="col-lg-12">
        <?php if (!empty($_GET['notif'])) { ?>
          <?php if ($_GET['notif'] == "tambahberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Ditambahkan</div>
          <?php } else if ($_GET['notif'] == "editberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Diubah</div>
          <?php } else if ($_GET['notif'] == "hapusberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Dihapus</div>
          <?php } ?>
        <?php } ?>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Pengguna</h4>

          </div>
          <div class="card-body">
            <a href="index.php?include=tambah-user" class="btn btn-sm btn-info float-left"><i class="flaticon-381-plus"></i>
              Tambah User</a>

            <form method="post" action="index.php?include=user">
              <div class="row float-right">
                <div class="col-md-6 bottom-10">
                  <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                </div>
                <div class="col-md-6 bottom-10">
                  <button type="submit" class="btn btn-sm btn-info float-left"><i class="flaticon-381-search-2"></i>&nbsp; Search</button>
                </div>
              </div>
            </form>
            <div class="table-responsive">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th style="width:80px;"><strong>No</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Level</strong></th>
                    <th><strong>Aksi</strong></th>
                    <th></th>
                  </tr>


                </thead>
                <tbody>
                  <?php
                  $batas = 4;
                  if (!isset($_GET['halaman'])) {
                    $posisi = 0;
                    $halaman = 1;
                  } else {
                    $halaman = $_GET['halaman'];
                    $posisi = ($halaman - 1) * $batas;
                  }
                  $sql_k = "SELECT `id_user`,`nama`,`email`,`level` FROM
                      `user`";
                  if (!empty($katakunci_user)) {
                    //$katakunci_user =$_GET["katakunci"];
                    $sql_k .= " where `nama` LIKE '%$katakunci_user%'";
                  }
                  $sql_k .= " ORDER BY `nama` limit $posisi, $batas";
                  $query_k = mysqli_query($koneksi, $sql_k);
                  $no = $posisi + 1;
                  while ($data_k = mysqli_fetch_row($query_k)) {
                    $id_user = $data_k[0];
                    $nama = $data_k[1];
                    $email = $data_k[2];
                    $level = $data_k[3];
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $nama ?></td>
                      <td><?php echo $email ?></td>
                      <td><span class="badge light badge-success"><?php echo $level ?></span></td>
                      <td>
                        <div class="d-flex">
                          <a href="index.php?include=edit-user&data=<?php echo $id_user; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data<?php echo $id_user; ?>?'))window.location.href ='index.php?include=user&aksi=hapus&data=<?php echo $id_user; ?>&notif=hapusberhasil'" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- /.card-body -->
          <?php
          //hitung semua jum.data
          $sql_jum = "SELECT `id_user`,`nama`,`email`,`level` FROM `user`";
          if (!empty($katakunci_user)) {
            //$katakunci_penerbit = $_GET["katakunci"];
            $sql_jum .= " where `nama` LIKE '%$katakunci_user%'";
          }
          $sql_jum .= " order by `nama`";
          $query_jum = mysqli_query($koneksi, $sql_jum);
          $jum_data = mysqli_num_rows($query_jum);
          $jum_halaman = ceil($jum_data / $batas);
          ?>
          <div class="card-footer clearfix">
            <ul class="pagination pagination-gutter pagination-primary no-bg float-right">
              <?php
              if ($jum_halaman == 0) {
                //tidak ada halaman
              } else if ($jum_halaman == 1) {
                echo "<li class='page-item'><a class='page-link'>1</a></li>";
              } else {
                $sebelum = $halaman - 1;
                $setelah = $halaman + 1;
                if ($halaman != 1) {
                  echo "<li class='page-item'>
                  <a class='page-link'
                  href='index.php?include=user&halaman=1'>First</a></li>";
                  echo "<li class='page-item'><a class='page-link'
                href='index.php?include=user&halaman=$sebelum'>
                «</a></li>";
                }
                for ($i = 1; $i <= $jum_halaman; $i++) {
                  if ($i > $halaman - 5 and $i < $halaman + 5) {
                    if ($i != $halaman) {
                      echo "<li class='page-item'><a class='page-link'
                      href='index.php?include=user&halaman=$i'>$i</a></li>";
                    } else {
                      echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                    }
                  }
                }
                if ($halaman != $jum_halaman) {
                  echo "<li class='page-item'>
                  <a class='page-link'
                  href='index.php?include=user&halaman=$setelah'>»</a></li>";
                  echo "<li class='page-item'><a class='page-link'href='index.php?include=user&halaman=$jum_halaman'>
                  Last</a></li>";
                }
              } ?>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>