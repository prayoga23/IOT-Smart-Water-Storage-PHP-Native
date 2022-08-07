<?php


$id_user = $_SESSION['id_user']; //get profil
$tampil = "SELECT `nama`, `email`,`foto`,`level` FROM `user` where `id_user`='$id_user'"; //echo $sql;
$query = mysqli_query($koneksi, $tampil);
while ($data = mysqli_fetch_row($query)) {
	$nama = $data[0];
	$email = $data[1];
	$foto2 = $data[2];
	$level = $data[3];
}
?>

<!--**********************************
            Nav header end
        ***********************************-->




<!--**********************************
            Header start
        ***********************************-->
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
						Dashboard
					</div>
				</div>

				<ul class="navbar-nav header-right">
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link dz-fullscreen" href="#">
							<svg id="icon-full" viewBox="0 0 24 24" width="26" height="26" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
								<path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
							</svg>
							<svg id="icon-minimize" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize">
								<path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path>
							</svg>
						</a>
					</li>
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link  ai-icon" href="#" role="button" data-toggle="dropdown">
							<i class="flaticon-381-ring"></i>
							<div class="pulse-css"></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
								<ul class="timeline">
									<li>
										<div class="timeline-panel">
											<div class="media mr-2">
												<img alt="image" width="50" src="images/backend/<?php echo $foto; ?>">
											</div>
											<div class="media-body">
												<h6 class="mb-1">Dr sultads Send you Photo</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media mr-2 media-info">
												KG
											</div>
											<div class="media-body">
												<h6 class="mb-1">Resport created successfully</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media mr-2 media-success">
												<i class="fa fa-home"></i>
											</div>
											<div class="media-body">
												<h6 class="mb-1">Reminder : Treatment Time!</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media mr-2">
												<img alt="image" width="50" src="images/avatar/1.jpg">
											</div>
											<div class="media-body">
												<h6 class="mb-1">Dr sultads Send you Photo</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media mr-2 media-danger">
												KG
											</div>
											<div class="media-body">
												<h6 class="mb-1">Resport created successfully</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media mr-2 media-primary">
												<i class="fa fa-home"></i>
											</div>
											<div class="media-body">
												<h6 class="mb-1">Reminder : Treatment Time!</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
						</div>
					</li>
					<li class="nav-item dropdown header-profile">
						<a class="nav-link" href="#" role="button" data-toggle="dropdown">
							<div class="header-info">
								<span><?php echo $nama; ?></span>
								<small><?php echo $level; ?></small>
							</div>

							<img src="foto/<?php echo $foto2; ?>" width="40%" alt="" />
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							<a href="../index.php" class="dropdown-item ai-icon">
								<i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp; Website Utama</a>

							</a>
							<a href="index.php?include=profil" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
								<span class="ml-2">Profile </span>
							</a>

							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
									<polyline points="16 17 21 12 16 7"></polyline>
									<line x1="21" y1="12" x2="9" y2="12"></line>
								</svg>

								&nbsp;&nbsp;Logout
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>