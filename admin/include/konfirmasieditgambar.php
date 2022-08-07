<?php
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    //get gambar_perusahaan
    $sql_f = "SELECT `gambar_perusahaan` FROM `logobrand` WHERE `id`='$id'";
    $query_f = mysqli_query($koneksi, $sql_f);
    while ($data_f = mysqli_fetch_row($query_f)) {
        $gambar_perusahaan = $data_f[0];
    }
}
if (isset($_SESSION['id'])) {
    $id =  $_SESSION['id'];
    $gambar_perusahaan = $_FILES['gambar_perusahaan']['name'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    if (empty($nama_perusahaan)) {
        header("Location:index.php?include=edit-logobrand&notif=editkosong&jenis=nama_perusahaan");
    } else {
        if (!empty($gambar_perusahaan) && !empty($password)) {
            $lokasi_file = $_FILES['gambar_perusahaan']['tmp_name'];
            $direktori = "foto/" . $gambar_perusahaan;
            unlink("foto/$gambar_perusahaan");
            $password = MD5($password);
            if (move_uploaded_file($lokasi_file, $direktori)) {
                $sql = "update `logobrand` set `nama_perusahaan`='$nama_perusahaan', `gambar_perusahaan`='$gambar_perusahaan' where id='$id'";
            }
            mysqli_query($koneksi, $sql);
        } else if (!empty($gambar_perusahaan)) {
            $lokasi_file = $_FILES['gambar_perusahaan']['tmp_name'];
            $direktori = "foto/" . $gambar_perusahaan;
            unlink("foto/$gambar_perusahaan");
            if (move_uploaded_file($lokasi_file, $direktori)) {
                $sql = "update `logobrand` set `nama_perusahaan`='$nama_perusahaan', `gambar_perusahaan`='$gambar_perusahaan' where id='$id'";
            }
            mysqli_query($koneksi, $sql);
        } else {
            $sql = "update `logobrand` set `nama_perusahaan`='$nama_perusahaan' where id='$id'";
            mysqli_query($koneksi, $sql);
        }
        header("Location:index.php?include=logobrand&notif=editberhasil");
    }
}
