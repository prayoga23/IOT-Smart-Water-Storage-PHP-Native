<?php
//akses file koneksi database
include('koneksi/koneksi.php');
//  require_once('includes/fungsi/getdatabyid.php');
if (isset($_POST['tambahgambar'])) {
	$gambar_perusahaan = $_FILES['gambar_perusahaan']['name'];
	$nama_perusahaan = $_POST['nama_perusahaan'];
	//cek username and email
	//   $data = getDataById(1, $koneksi);
	//   var_dump($data); die;
	if (empty($gambar_perusahaan)) {
		header("Location:index.php?include=tambah-logobrand&notif=tambahkosong&jenis=gambar_perusahaan");
	} else if (empty($nama_perusahaan)) {
		header("Location:index.php?include=tambah-logobrand&notif=tambahkosong&jenis=nama_perusahaan");
	} else {
		$password = MD5($password);
		$lokasi_file = $_FILES['gambar_perusahaan']['tmp_name'];
		$direktori = "foto/" . $gambar_perusahaan;
		if (move_uploaded_file($lokasi_file, $direktori)) {
			$sql = "INSERT INTO `logobrand` (`nama_perusahaan`, `gambar_perusahaan`) VALUES ('$nama_perusahaan', '$gambar_perusahaan');";
			mysqli_query($koneksi, $sql);
		}
		header("Location:index.php?include=logobrand&notif=tambahberhasil");
	}
}
