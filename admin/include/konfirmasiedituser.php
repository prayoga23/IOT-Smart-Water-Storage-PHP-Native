<?php
 //akses file koneksi database
include('koneksi/koneksi.php');
 session_start();
 	 		 $id_user = $_GET['id_user'];
 //get foto
 $sql_f = "SELECT `foto` FROM `user` WHERE `id_user`='$id_user'";
 $query_f = mysqli_query($koneksi,$sql_f);
 while ($data_f = mysqli_fetch_row($query_f)) {
     $foto = $data_f[0];
 }
 if (isset($_SESSION['id_user'])) {
	 $id_user =  $_SESSION ['id_user'];
     $foto = $_FILES['foto']['name'];
     $nama = $_POST['nama'];
     $email = $_POST['email'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $level = $_POST['level'];
     if(empty($nama)) {
        header("Location:index.php?include=edit-user&notif=editkosong&jenis=nama");
     } else if(empty($email)) {
        header("Location:index.php?include=edit-user&notif=editkosong&jenis=email");
     } else if(empty($username)) {
        header("Location:index.php?include=edit-user&notif=editkosong&jenis=username");
     } else if(empty($level)) {
        header("Location:index.php?include=edit-user&notif=editkosong&jenis=level");
     } else {
        if(!empty($foto) && !empty($password)) {
         $lokasi_file = $_FILES['foto']['tmp_name'];
         $direktori = "foto/".$foto;
         unlink("foto/$foto");
         $password = MD5($password);
         if (move_uploaded_file($lokasi_file, $direktori)) {
             $sql = "update `user` set `nama`='$nama', `email`='$email', `username`='$username', `password`='$password', `level`='$level', `foto`='$foto' where id_user='$id_user'";
         }
         mysqli_query($koneksi,$sql);
        } else if(!empty($foto)) {
         $lokasi_file = $_FILES['foto']['tmp_name'];
         $direktori = "foto/".$foto;
         unlink("foto/$foto");
         if (move_uploaded_file($lokasi_file, $direktori)) {
            $sql = "update `user` set `nama`='$nama', `email`='$email', `username`='$username', `level`='$level', `foto`='$foto' where id_user='$id_user'";
         }
         mysqli_query($koneksi,$sql);
        } else if(!empty($password)) {
         $password = MD5($password);
         $sql = "update `user` set `nama`='$nama', `email`='$email', `username`='$username', `password`='$password', `level`='$level' where id_user='$id_user'";
         mysqli_query($koneksi,$sql);
        } else {
         $sql = "update `user` set `nama`='$nama', `email`='$email', `username`='$username', `level`='$level' where id_user='$id_user'";
         mysqli_query($koneksi,$sql);
        }
        header("Location:index.php?include=user&notif=editberhasil");
     }
 }