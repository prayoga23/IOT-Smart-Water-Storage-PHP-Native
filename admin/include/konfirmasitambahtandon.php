<?php
//akses file koneksi database
include('koneksi/koneksi.php');
if (isset($_POST['tambahtandon'])) {
   $nama_jenis_tandon = $_POST['nama_jenis_tandon'];
   if (empty($nama_jenis_tandon)) {
      header("Location:index.php?include=tambah-tandon&data=&notif=tambahkosong&jenis=nama_jenis_tandon");
   } else {
      $sql = "INSERT INTO `tandon` (`nama_jenis_tandon`) VALUES ('$nama_jenis_tandon');";
      mysqli_query($koneksi, $sql);
   }
   header("Location:index.php?include=tandon&notif=tambahberhasil");
}
