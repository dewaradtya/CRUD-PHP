<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan2";


// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);
// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal:" . mysqli_connect_error());
}
?>