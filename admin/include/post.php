<?php
//  include('koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_post = $_GET['data'];
    //hapus kategori buku
    $sql_dh = "delete from `post` where `id_post` = '$id_post'";
    mysqli_query($koneksi, $sql_dh);
  }
}
if (isset($_POST["katakunci"])) {
  $katakunci_post = $_POST["katakunci"];
  $_SESSION['katakunci_post'] = $katakunci_post;
}
if (isset($_SESSION['katakunci_post'])) {
  $katakunci_post = $_SESSION['katakunci_post'];
}
?>

<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
          <h4>Management Post</h4>

        </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Management Post</a></li>
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
            <h4 class="card-title">Management Post</h4>

          </div>
          <div class="card-body">
            <a href="index.php?include=tambah-post" class="btn btn-sm btn-info float-left"><i class="flaticon-381-plus"></i>
              Tambah post</a>

            <form method="post" action="index.php?include=post">
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
                    <th><strong>ID.</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Pekerjaan</strong></th>
                    <th><strong>Deskripsi</strong></th>
                    <th><strong>Action</strong></th>
                  </tr>


                </thead>
                <tbody>
                  <?php
                  $batas = 2;
                  if (!isset($_GET['halaman'])) {
                    $posisi = 0;
                    $halaman = 1;
                  } else {
                    $halaman = $_GET['halaman'];
                    $posisi = ($halaman - 1) * $batas;
                  }

                  $sql_k = "SELECT `id_post`,`nama`,`pekerjaan`,`description` FROM `post`";
                  if (!empty($katakunci_post)) {
                    //$katakunci_post =$_GET["katakunci"];
                    $sql_k .= " where `nama` LIKE '%$katakunci_post%'";
                  }
                  $sql_k .= " ORDER BY `nama` limit $posisi, $batas";
                  $query_k = mysqli_query($koneksi, $sql_k);
                  $no = $posisi + 1;
                  while ($data_p = mysqli_fetch_row($query_k)) {
                    $id_post = $data_p[0];
                    $nama = $data_p[1];
                    $pekerjaan = $data_p[2];
                    $description = $data_p[3];
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $nama; ?></td>
                      <td><?php echo $pekerjaan; ?></td>
                      <td><?php echo $description; ?></td>
                      <td>
                        <div class="d-flex">
                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data<?php echo $id_post; ?>?'))window.location.href ='index.php?include=post&aksi=hapus&data=<?php echo $id_post; ?>&notif=hapusberhasil'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

          <!-- /.card-pody -->
          <?php
          //hitung semua data
          $sql_jum = "SELECT `id_post`,`nama`,`pekerjaan`,`description` FROM `post`";
          if (!empty($katakunci_post)) {
            //$katakunci_kategori = $_GET["katakunci"];
            $sql_jum .= " where `p`.`nama` LIKE '%$katakunci_post%'";
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
                $sepelum = $halaman - 1;
                $setelah = $halaman + 1;
                if ($halaman != 1) {
                  echo "<li class='page-item'><a class='page-link'href='index.php?include=post&halaman=1'>First</a></li>";
                  echo "<li class='page-item'><a class='page-link'href='index.php?include=post&halaman=$sepelum'>«</a></li>";
                }
                for ($i = 1; $i <= $jum_halaman; $i++) {
                  if ($i != $halaman) {
                    echo "<li class='page-item'><a class='page-link'href='index.php?include=post&halaman=$i'>$i</a></li>";
                  } else {
                    echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                  }
                }
                if ($halaman != $jum_halaman) {
                  echo "<li class='page-item'><a class='page-link'href='index.php?include=post&halaman=$setelah'>»</a></li>";
                  echo "<li class='page-item'><a class='page-link'href='index.php?include=post&halaman=$jum_halaman'>Last</a></li>";
                }
              }  ?>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.card -->
<!-- Logout Modal-->

</html>