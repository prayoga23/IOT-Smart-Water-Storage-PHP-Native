<?php
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $username = mysqli_real_escape_string($koneksi, $user);
    $password = mysqli_real_escape_string($koneksi, MD5($pass)); //cek username dan password
    $sql = "select `id_user`, `level` from `user` where `username`='$username' and `password`='$password'";
    $query = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($query);

    if (empty($user)) {
        header("Location:index.php?include=login&gagal=userKosong");
    } else if (empty($pass)) {
        header("Location:index.php?include=login&gagal=passKosong");
    } else if ($jumlah == 0) {
        header("Location:index.php?include=login&gagal=userpassSalah");
    }

    while ($data = mysqli_fetch_row($query)) {
        $id_user = $data[0]; //1
        $level = $data[1]; //speradmin
        $_SESSION['id_user'] = $id_user;
        $_SESSION['level'] = $level;
        if ($_SESSION['level'] == "User") {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("<b>Anda Berhasil Login. <br> Selamat Datang Di <br> Smart Water Storage</b>","<strong>Silahkan Dibaca Buku Panduan supaya mengerti cara penggunaannya. Jika Tidak Membaca Panduan. Panduan Ini Tidak Ada di menu aplikasi ini.</strong>","success");';
            echo '}, 1000);</script>';
            echo '<script>
    setTimeout(function() {
        swal({
            title: "<b>Anda Berhasil Login. <br> Selamat Datang Di <br> Smart Water Storage</b>",
            "<strong>Silahkan Dibaca Buku Panduan supaya mengerti cara penggunaannya. Jika Tidak Membaca Panduan. Panduan Ini Tidak Ada di menu aplikasi ini.</strong>",
            type: "success"
        }, function() {
            window.location = "";
        });
    }, 1000);
</script>';
        } else {
            echo '<script>
            setTimeout(function() {
                swal({
                    title: "Welcome Back Sir!",
                    text: "I Hope Your Day Is Always Good!",
                    type: "success"
                }, function() {
                    window.location = "include/dashboard.php";
                });
            }, 1000);
        </script>';
        }
    }
}

?>
<?php if (empty($user)) {
} ?>
<?php if ($_SESSION['level'] == "User") {
    if ($_SESSION['level'] == "User") { ?>
        <?php include("include/intro.php") ?>
<?php
    }
}
?>
<?php if ($_SESSION['level'] == "Superadmin") {
    if ($_SESSION['level'] == "Superadmin") { ?>
        <?php include("include/dashboard.php") ?>
<?php
    }
}
?>