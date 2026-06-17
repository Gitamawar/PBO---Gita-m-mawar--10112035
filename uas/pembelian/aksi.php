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
    $no_pembelian = $_POST['no_pembelian'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];
    $id_supplier = $_POST['id_supplier'];
    $kd_barang = $_POST['kd_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    
    // Get harga beli
    if (!empty($_POST['harga_beli'])) {
        $harga_beli = $_POST['harga_beli'];
    } else {
        $barang = $barangObj->get_data_by_id($kd_barang);
        $harga_beli = $barang['harga_beli'];
    }
    
    if ($transaksiObj->tambah_pembelian($no_pembelian, $tanggal_pembelian, $id_supplier, $kd_barang, $jumlah_barang, $harga_beli)) {
        header("Location: index.php?pesan=tambah_sukses");
    } else {
        header("Location: index.php?pesan=tambah_gagal");
    }
}
?>
