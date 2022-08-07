<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_water_level";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $db);

// Check connection
if ($koneksi->connect_error) {
  die("Connection failed: " . $koneksi->connect_error);
}
