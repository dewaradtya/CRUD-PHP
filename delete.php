<?php
// Konfigurasi koneksi ke database
include_once("konfigurasi.php");

// Get id from URL to delete that user
// Get id dari URL untuk menghapus user

$id = $_GET ['id'];

// Delete baris user berdasrkan id yang diberikan
$result = mysqli_query($koneksi,"DELETE FROM buku WHERE id=$id");

header("Location:index.php");
?>