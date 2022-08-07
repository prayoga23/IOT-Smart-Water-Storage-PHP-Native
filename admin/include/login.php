<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Smart Water Storage </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="theme/images/favicon.png">
    <link href="theme/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="theme/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="theme/css/style.css" rel="stylesheet">
    <style>
        body {
            width: 100%;
            min-height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(logincss/css/water.jpg);
            background-position: center;
            background-size: cover;

        }
    </style>

</head>

<body> <br>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    &nbsp; <img class="text-center mb-4" src="../assets/images/logo3.png" width="95%">
                                    <h4 class="text-center mb-4">Welcome To Smart Water Storage</h4>
                                    <?php if (!empty($_GET['gagal'])) { ?>
                                        <?php if ($_GET['gagal'] == "userKosong") { ?>
                                            <span class="text-danger"> Maaf Username Tidak Boleh Kosong </span>
                                        <?php } else if ($_GET['gagal'] == "passKosong") { ?>
                                            <span class="text-danger"> Maaf Password Tidak Boleh Kosong </span>
                                        <?php } else { ?>
                                            <span class="text-danger"> Maaf Username dan Password Anda Salah </span>
                                        <?php } ?>
                                    <?php
                                    }
                                    ?>
                                    <form action="index.php?include=konfirmasi-login" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" value="login" class="btn btn-primary btn-block text-large" style="padding-bottom: 40px;">
                                            <h4 class="text-white">Sign In</h4>
                                        </button>

                                    </form>
                                    <!-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="include/register.php">Sign up</a></p>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="theme/vendor/global/global.min.js"></script>
    <script src="theme/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="theme/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="theme/js/custom.min.js"></script>
    <script src="theme/js/deznav-init.js"></script>
    <!-- Apex Chart -->
    <script src="theme/vendor/apexchart/apexchart.js"></script>


    <script src="theme/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="theme/js/plugins-init/sweetalert.init.js"></script>


</body>

</html>