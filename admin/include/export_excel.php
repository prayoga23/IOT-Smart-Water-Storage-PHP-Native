<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=laporan-data-sensor.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../koneksi/koneksi.php';

$output = "";

$output .= "
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nilai</th>
					<th>Waktu</th>
				</tr>
			<tbody>
	";

$query = $koneksi->query("SELECT * FROM `data`");
while ($fetch = $query->fetch_array()) {

	$output .= "
				<tr>
					<td>" . $fetch['id'] . "</td>
					<td>" . $fetch['nilai'] . "</td>
					<td>" . $fetch['waktu'] . "</td>
				</tr>
	";
}

$output .= "
			</tbody>

		</table>
	";

echo $output;
