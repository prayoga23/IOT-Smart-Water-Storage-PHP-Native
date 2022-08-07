<div class="logo-slider">
	<?php
	$sql_l = "SELECT `id_post`,`nama`,`pekerjaan`,`description` FROM `post`";
	$query_l = mysqli_query($koneksi, $sql_l);
	while ($data_l = mysqli_fetch_row($query_l)) {
		$id_post = $data_l[0];
		$nama = $data_l[1];
		$pekerjaan = $data_l[2];
		$description = $data_l[3]; ?>
		<div class="item">

			<div class="testimonial">

				<p class="text-primary"><?php echo $description; ?></p>
				<br>
				<p class="overview" style="color: orange;"><strong><?php echo $nama; ?></strong>, <?php echo $pekerjaan; ?></p>
			</div>
		</div>

	<?php } ?>
</div>