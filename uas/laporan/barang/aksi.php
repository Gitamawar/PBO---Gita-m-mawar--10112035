<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Barang.php';

$auth = new Auth();
$auth->checkAuth();

$barangObj = new Barang();

$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    $kd_barang = $_POST['kd_barang'];
    $kode_jenis = $_POST['kode_jenis'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $gambar_produk = ''; // Assuming no image upload for now based on slide
    
    if ($barangObj->tambah_data($kd_barang, $kode_jenis, $nama_barang, $stok, $harga_beli, $harga_jual, $gambar_produk)) {
        header("Location: index.php?pesan=tambah_sukses");
    } else {
        header("Location: index.php?pesan=tambah_gagal");
    }
} else if ($aksi == 'edit') {
    $kd_barang_lama = $_POST['kd_barang_lama'];
    $kd_barang = $_POST['kd_barang'];
    $kode_jenis = $_POST['kode_jenis'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $gambar_produk = ''; // Assuming no image upload
    
    if ($barangObj->edit_data($kd_barang_lama, $kd_barang, $kode_jenis, $nama_barang, $stok, $harga_beli, $harga_jual, $gambar_produk)) {
        header("Location: index.php?pesan=edit_sukses");
    } else {
        header("Location: index.php?pesan=edit_gagal");
    }
}
?>
