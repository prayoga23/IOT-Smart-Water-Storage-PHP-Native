<?php
include("../koneksi/koneksi.php");

$jarak = isset($_POST['jarak']) ? $_POST['jarak'] : '0';

if (!empty($jarak)) {
    $sql = "INSERT INTO `data_tandon2` (`id`, `nilai`, `waktu`) VALUES (NULL, '" . $jarak . "', CURRENT_TIMESTAMP)";
    if ($koneksi->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
