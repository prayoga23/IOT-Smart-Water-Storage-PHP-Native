<?php
include '../koneksi/koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {

		// Mengambil ID diURL
		$id = $_GET['id'];

		// Mengambil data gambar_perusahaan didalam table siswa
		$get_foto = "SELECT gambar_perusahaan FROM logobrand WHERE id='$id'";
		$data_foto = mysqli_query($koneksi, $get_foto);
		// Mengubah data yang diambil menjadi Array
		$foto_lama = mysqli_fetch_array($data_foto);

		// Menghapus Foto lama didalam folder FOTO
		unlink("foto/" . $foto_lama['gambar_perusahaan']);

		// Mengapus data siswa berdasarkan ID
		$query = mysqli_query($koneksi, "DELETE FROM logobrand WHERE id='$id'");
		if ($query) {
			header("Location:index.php?include=logobrand&pesan=hapus");
		} else {
			header("Location:index.php?include=logobrand&pesan=gagalhapus");
		}
	} else {
		// Apabila ID nya kosong maka akan dikembalikan kehalaman index
		header("Location:index.php?include=logobrand");
	}
} else {
	// Jika tidak ada Data ID maka akan dikembalikan kehalaman index
	header("Location:index.php?include=logobrand");
}
