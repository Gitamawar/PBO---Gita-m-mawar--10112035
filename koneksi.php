<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "gudang_si"; // <-- SUDAH DIUBAH DI SINI (Sebelumnya si_gudang)

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek apakah koneksi berhasil atau gagal
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>