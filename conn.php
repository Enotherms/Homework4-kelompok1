<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "kelompok1_h4";
$conn = mysqli_connect($host, $user, $pass);

if(!$conn){
    die("Koneksi dengan Mysql Gagal !!<br>".mysqli_connect_error());
}

$sql = mysqli_select_db($conn, $dbName);
if(!$sql){
    die("Koneksi Database Gagal !!".mysqli_error($conn));
}
?>