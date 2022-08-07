<?php session_start();
include("koneksi/koneksi.php");
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasi-login") {
    include("include/konfirmasilogin.php");
  } else if ($include == "logout") {
    include("include/logout.php");
  } else if ($include == "konfirmasi-tambah-user") {
    include("include/konfirmasitambahuser.php");
  } else if ($include == "konfirmasi-edit-user") {
    include("include/konfirmasiedituser.php");
  } else if ($include == "konfirmasi-edit-profil") {
    include("include/konfirmasieditprofil.php");
  } else if ($include == "konfirmasi-tambah-gambar") {
    include("include/konfirmasitambahgambar.php");
  } else if ($include == "konfirmasi-edit-gambar") {
    include("include/konfirmasieditgambar.php");
  } else if ($include == "hapus-gambar") {
    include("include/deletegambar.php");
  } else if ($include == "konfirmasi-tambah-post") {
    include("include/konfirmasitambahpost.php");
  } else if ($include == "konfirmasi-tambah-tandon") {
    include("include/konfirmasitambahtandon.php");
  } else if ($include == "konfirmasi-edit-post") {
    include("include/konfirmasieditpost.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>


  <?php include("includes/head.php") ?>

</head>
<?php
//cek ada get include
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  //cek apakah ada session id admin
  if (isset($_SESSION['id_user'])) { ?>

    <body>
      <!--*******************
        Preloader start
    ********************-->
      <div id="preloader">
        <div class="sk-three-bounce">
          <div class="sk-child sk-bounce1"></div>
          <div class="sk-child sk-bounce2"></div>
          <div class="sk-child sk-bounce3"></div>
        </div>
      </div>
      <!--*******************
        Preloader end
    ********************-->

      <!--**********************************
        Main wrapper start
    ***********************************-->
      <div id="main-wrapper">


        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
          <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="theme/images/1.png" alt="">
            <img class="logo-compact" style="width: 10%;" src="theme/images/2.png" alt="">
            <img class="brand-title" style="width: 70%;" src="theme/images/2.png" alt="">
          </a>

          <div class="nav-control">
            <div class="hamburger">
              <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
          </div>
        </div>
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
      </div>

      <?php
      if ($include == "edit-profil") {
        include("include/editprofil.php");
      } else if ($include == "user") {
        include("include/user.php");
      } else if ($include == "profil") {
        include("include/profil.php");
      } else if ($include == "edit-user") {
        include("include/edituser.php");
      } else if ($include == "edit-profil") {
        include("include/editprofil.php");
      } else if ($include == "tambah-user") {
        include("include/tambahuser.php");
      } else if ($include == "detail-user") {
        include("include/detailuser.php");
      } else if ($include == "ubah-password") {
        include("include/ubahpassword.php");
      } else if ($include == "edit-gambar") {
        include("include/editgambar.php");
      } else if ($include == "tambah-gambar") {
        include("include/tambahgambar.php");
      } else if ($include == "tambah-post") {
        include("include/tambahpost.php");
      } else if ($include == "post") {
        include("include/post.php");
      } else if ($include == "register") {
        include("include/register.php");
      } else if ($include == "logobrand") {
        include("include/logobrand.php");
      } else if ($include == "tandon") {
        include("include/tandon.php");
      } else if ($include == "tambah-tandon") {
        include("include/tambahtandon.php");
      } else if ($include == "delete-tandon") {
        include("include/deletetandondashboard.php");
      } else if ($include == "dashboard") {
        include("include/dashboard.php");
      }
      ?>
      </div>
      <!-- /.content-wrapper -->
      <?php include("includes/footer.php") ?>
      </div>
      <!-- End of Content Wrapper -->

      </div>
      </div>
    </body>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda Ingin Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal">Tidak</button>
            <a class="btn btn-danger" href="index.php?include=logout">Iya, Logout</a>
          </div>
        </div>
      </div>
    </div>
    <?php include("includes/script.php") ?>
    </body>
  <?php
  } else {
    //pemanggilan halaman form login
    include("include/login.php");
  }
} else {
  if (isset($_SESSION['id_user'])) {

  ?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <div class="nav-header">
          <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="theme/images/1.png" alt="">
            <img class="logo-compact" style="width: 10%;" src="theme/images/2.png" alt="">
            <img class="brand-title" style="width: 70%;" src="theme/images/2.png" alt="">
          </a>

          <!-- <div class="nav-control">
          <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
          </div>
        </div> -->
        </div>
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          //pemanggilan profil
          include("include/dashboard.php");
          ?>
        </div> <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- End of Content Wrapper -->

      </div>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Anda Ingin Keluar ?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-dismiss="modal">Tidak</button>
              <a class="btn btn-danger" href="index.php?include=logout">Iya, Keluar</a>
            </div>
          </div>
        </div>
      </div>
      <?php include("includes/script.php") ?>
    </body>
<?php } else {
    //pemanggilan halaman form login
    include("include/login.php");
  }
} ?>


</body>

</html>