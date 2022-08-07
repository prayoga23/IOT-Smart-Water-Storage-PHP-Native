<?php

include("../../koneksi/koneksi.php");

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

if (isset($_POST['submit'])) {
    $foto = $_FILES['foto']['name'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($koneksi, $sql);
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $direktori = "../foto/" . $foto;
        if (move_uploaded_file($lokasi_file, $direktori)) {
            $sql = "INSERT INTO user (nama, username, email, password, level,foto)
					VALUES ('$nama','$username', '$email', '$password', 'User', '$foto')";
            mysqli_query($koneksi, $sql);
            if ($result) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("<b>Congratulations","Your Registration Is Success.! <br> Silahkan Ke Halaman Login. Untuk Masuk</b>","success");';
                echo '}, 500);</script>';

                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("<b>Woops!.","Something Wrong Went.!...</b>","error");';
                echo '}, 500);</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("<b>Woops!.","Username, Nama ,Email Yang Anda Daftar, Sudah Terdaftar.!...</b>","error");';
            echo '}, 500);</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Sorry!.","Password Not Matched.!...</b>","error");';
        echo '}, 500);</script>';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../theme/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../theme/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../logincss/css/styles.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo.png">

    <title>Register | Smart Water Storage</title>
</head>

<body>
    <div class="container">

        <form action="" method="POST" class="login-email" enctype="multipart/form-data">
            &nbsp; <img class="text-center mb-2" src="../../assets/images/logo3.png" width="95%">
            <p class="login-text" style="font-size: 1.5rem; font-weight: 700;">Register</p>
            <div class="user-image mb-3 text-center">
                <div style="width: 200px; height: 200px; overflow: hidden;  margin: 0 auto">
                    <img src="../logincss/profile/profil.png" class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="foto" class="custom-file-input" id="foto">
                    <label class="custom-file-label">Foto Profil</label>
                </div>
            </div>
            <div class="input-group">
                <input type="text" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Masukkan Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="../index.php">Login Here</a>.</p>
        </form>
    </div>
</body>
<!-- jQuery -->
<script src="../theme/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../theme/js/plugins-init/sweetalert.init.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgPlaceholder').attr('src', e.target.result);
            }
            // base64 string conversion
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto").change(function() {
        readURL(this);
    });
</script>

</html>