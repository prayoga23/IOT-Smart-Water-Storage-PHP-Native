<?php
include('../koneksi/koneksi.php');
$result = array();
$no = 1;
$table = mysqli_query($koneksi, "SELECT * FROM `data_tandon2` ORDER BY waktu DESC LIMIT 7"); //nodemcu_ldr_table = Youre_table_name
while ($row = mysqli_fetch_array($table)) {
    array_push($result, array(
        'id' => $no++,
        'nilai' => $row['nilai'],
        'waktu' => $row['waktu'],
    ));
}
$data['sensor'] = $result;
echo json_encode($data);
