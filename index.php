<?php include("koneksi/koneksi.php"); ?>

<?php include("includes/head.php"); ?>

<?php
//pemanggilan konten halaman index

if (isset($_GET["include"])) {
    $include = $_GET["include"];
    if ($include == "konfirmasi-post") {
        include("includes/konfirmasipost.php");
    } else {
        include("includes/index.php");
    }
} else {
    include("includes/index.php");
}
?>
<?php include("includes/script.php"); ?>