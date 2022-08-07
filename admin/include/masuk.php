<?php
include("../koneksi/koneksi.php");

$jarak = isset($_POST['jarak']) ? $_POST['jarak'] : '0';
$iddevice = isset($_POST['iddevice']) ? $_POST['iddevice'] : '0';

if (!empty($jarak)) {
    $sql = "INSERT INTO `data` (`id`, `nilai`, `waktu`, `id_tandon`) VALUES (NULL, '" . $jarak . "', (CURRENT_TIMESTAMP), '" . $iddevice . "')";
    if ($koneksi->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
