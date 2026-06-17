<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Transaksi.php';
require_once __DIR__ . '/../class/Barang.php';

$auth = new Auth();
$auth->checkAuth();

$transaksiObj = new Transaksi();
$barangObj = new Barang();

$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    $no_penjualan = $_POST['no_penjualan'];
    $tanggal_penjualan = $_POST['tanggal_penjualan'];
    $id_customer = $_POST['id_customer'];
    $kd_barang = $_POST['kd_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    
    // Cek Stok
    $barang = $barangObj->get_data_by_id($kd_barang);
    if ($barang['stok'] < $jumlah_barang) {
        die("Stok barang tidak mencukupi! <a href='tambah.php'>Kembali</a>");
    }

    // Get harga jual
    if (!empty($_POST['harga_jual'])) {
        $harga_jual = $_POST['harga_jual'];
    } else {
        $harga_jual = $barang['harga_jual'];
    }
    
    if ($transaksiObj->tambah_penjualan($no_penjualan, $tanggal_penjualan, $id_customer, $kd_barang, $jumlah_barang, $harga_jual)) {
        header("Location: index.php?pesan=tambah_sukses");
    } else {
        header("Location: index.php?pesan=tambah_gagal");
    }
}
?>
