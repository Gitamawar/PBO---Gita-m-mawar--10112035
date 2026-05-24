<?php 
// Hubungkan dengan file koneksi
include 'koneksi.php';

// Menangkap ID yang akan dihapus dari URL
$id = $_GET['id'];

// Query untuk menghapus data berdasarkan ID
$hapus = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");

if ($hapus) {
    // Jika berhasil, tendang kembali ke index.php dengan pesan hapus
    header("location:index.php?pesan=hapus");
    exit;
} else {
    die("Gagal menghapus data! Error MySQL: " . mysqli_error($koneksi));
}
?>