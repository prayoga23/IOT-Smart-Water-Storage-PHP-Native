<?php
//  include('koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $nama_jenis_tandon = $_GET['data'];
        //hapus pilih tandon
        $sql_dh = "delete from `tandon` where `nama_jenis_tandon` = '$nama_jenis_tandon'";
        mysqli_query($koneksi, $sql_dh);
    }
}
if (isset($_tandon["katakunci"])) {
    $katakunci_tandon = $_tandon["katakunci"];
    $_SESSION['katakunci_tandon'] = $katakunci_tandon;
}
if (isset($_SESSION['katakunci_tandon'])) {
    $katakunci_tandon = $_SESSION['katakunci_tandon'];
}

if (isset($_GET['id_active'])) {

    // Simpan nilai dari get ke
    // local variable "id_tandon"
    $id_tandon = $_GET['id_active'];

    // Kueri SQL yang menetapkan status
    // ke 1 untuk menunjukkan aktivasi.
    $sql = "UPDATE `tandon` SET `status` = '1' WHERE `tandon`.`id_tandon`='$id_tandon'";

    // Execute the query
    mysqli_query($koneksi, $sql);
}

if (isset($_GET['id_deactive'])) {

    // Simpan nilai dari get ke
    // local variable "id_tandon"
    $id_tandon = $_GET['id_deactive'];

    // Kueri SQL yang menetapkan status
    // ke 0 untuk menunjukkan aktivasi.
    $sql = "UPDATE `tandon` SET `status` = '0' WHERE `tandon`.`id_tandon`='$id_tandon'";

    // Execute the query
    mysqli_query($koneksi, $sql);
    // Go back to course-page.php

}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Management tandon</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Management tandon</a></li>
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
                        <h4 class="card-title">Management tandon</h4>

                    </div>
                    <div class="card-body">
                        <a href="index.php?include=tambah-tandon" class="btn btn-sm btn-info float-left"><i class="flaticon-381-plus"></i>
                            Tambah tandon</a>

                        <form method="tandon" action="index.php?include=tandon">
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
                                        <th scope="col"><strong>ID.</strong></th>
                                        <th scope="col"><strong>Nama Jenis Tandon</strong></th>
                                        <th scope="col"><strong>Status</strong></th>
                                        <th scope="col"><strong>Action</strong></th>
                                        <th scope="col"><strong>Hapus</strong></th>
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

                                    $sql_k = "SELECT `id_tandon`,`nama_jenis_tandon`,`status` FROM `tandon`";
                                    if (!empty($katakunci_tandon)) {
                                        //$katakunci_tandon =$_GET["katakunci"];
                                        $sql_k .= " where `nama_jenis_tandon` LIKE '%$katakunci_tandon%'";
                                    }
                                    $sql_k .= " ORDER BY `nama_jenis_tandon` limit $posisi, $batas";
                                    $query_k = mysqli_query($koneksi, $sql_k);
                                    $no = $posisi + 1;
                                    while ($data_t = mysqli_fetch_row($query_k)) {
                                        $id_tandon = $data_t[0];
                                        $nama_jenis_tandon = $data_t[1];
                                        $status = $data_t[2];
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $nama_jenis_tandon; ?></td>
                                            <td><?php
                                                // Usage of if-else statement to translate the
                                                // tinyint status value into some common terms
                                                // 0-Disabled status
                                                // 1-Active
                                                if ($status == "1")
                                                    echo "<span class='badge light badge-success'  style='font-size:20px;'> Tandon Sudah Aktif </span>";
                                                else
                                                    echo "<span class='badge light badge-danger' style='font-size:20px;'> Tandon Mati </span>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($status == "1")
                                                    echo
                                                    "<a href='index.php?include=tandon&id_deactive=" . $id_tandon . "'  class='btn btn-danger'>Disabled</a>";
                                                else
                                                    echo
                                                    "<a href='index.php?include=tandon&id_active=" . $id_tandon . "' class='btn btn-success'>Activate</a>";

                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data &nbsp;<?php echo $nama_jenis_tandon; ?>?'))window.location.href ='index.php?include=tandon&aksi=hapus&data=<?php echo $nama_jenis_tandon; ?>&notif=hapusberhasil'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                    $sql_jum = "SELECT `id_tandon`,`nama_jenis_tandon`,`status` FROM `tandon`";
                    if (!empty($katakunci_tandon)) {
                        //$katakunci_kategori = $_GET["katakunci"];
                        $sql_jum .= " where `t`.`nama_jenis_tandon` LIKE '%$katakunci_tandon%'";
                    }
                    $sql_jum .= " order by `nama_jenis_tandon`";
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
                                    echo "<li class='page-item'><a class='page-link'href='index.php?include=tandon&halaman=1'>First</a></li>";
                                    echo "<li class='page-item'><a class='page-link'href='index.php?include=tandon&halaman=$sepelum'>«</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i != $halaman) {
                                        echo "<li class='page-item'><a class='page-link'href='index.php?include=tandon&halaman=$i'>$i</a></li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                    echo "<li class='page-item'><a class='page-link'href='index.php?include=tandon&halaman=$setelah'>»</a></li>";
                                    echo "<li class='page-item'><a class='page-link'href='index.php?include=tandon&halaman=$jum_halaman'>Last</a></li>";
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