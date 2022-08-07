<?php
$id_user = $_SESSION['id_user']; //get profil
$sql = "SELECT `nama`, `email`,`foto`,`level` FROM `user` where `id_user`='$id_user'"; //echo $sql;
$query = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_row($query)) {
    $nama = $data[0];
    $email = $data[1];
    $foto = $data[2];
    $level = $data[3];
}
?>
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a href="index.php?include=dashboard" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="index.php?include=tandon" class="ai-icon" aria-expanded="false">
                    <img src="foto/tank.png" width="30px">
                    <span class="nav-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Tandon</span>
                </a>
            </li>
            <?php if ($_SESSION['level'] == "Superadmin") {
                if ($_SESSION['level'] == "Superadmin") { ?>
                    <li><a href="index.php?include=post" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-notepad"></i>
                            <span class="nav-text">Management Post</span>
                        </a>
                    </li>
                    <li><a href="index.php?include=logobrand" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-picture-1"></i>
                            <span class="nav-text">Management Logo Brand</span>
                        </a>
                    </li>
            <?php
                }
            }
            ?>
            <?php if ($_SESSION['level'] == "Superadmin") {
                if ($_SESSION['level'] == "Superadmin") { ?>
                    <li><a href="index.php?include=user" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-user-9"></i>
                            <span class="nav-text">Management User</span>
                        </a>
                    </li>
            <?php
                }
            }
            ?>
            <li><a href="index.php?include=profil" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-user-7"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li>

        </ul>


    </div>
</div>