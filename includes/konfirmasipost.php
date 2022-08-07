<?php
//akses file koneksi database
include('koneksi/koneksi.php');
if (isset($_POST['tambahpost'])) {
    $nama = $_POST['nama'];
    $pekerjaan = $_POST['pekerjaan'];
    $description = $_POST['description'];
    if (empty($nama)) {
        header("Location:index.php?include=tambah-post&data=&notif=tambahkosong&jenis=nama");
    } else if (empty($pekerjaan)) {
        header("Location:index.php?include=tambah-post&data=&notif=tambahkosong&jenis=pekerjaan");
    } else if (empty($description)) {
        header("Location:index.php?include=tambah-post&data=&notif=tambahkosong&jenis=description");
    } else {
        $sql = "INSERT INTO `post` (`nama`, `pekerjaan`, `description`) VALUES ('$nama', '$pekerjaan', '$description');";
        mysqli_query($koneksi, $sql);
    }
    header("Location:index.php?&notif=tambahberhasil");
}
