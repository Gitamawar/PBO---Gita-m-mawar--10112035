<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Gudang.php';

$auth = new Auth();
$auth->checkAuth();

$gudangObj = new Gudang();

$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    $kode_gudang = $_POST['kode_gudang'];
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi = $_POST['lokasi'];
    
    if ($gudangObj->tambah_data($kode_gudang, $nama_gudang, $lokasi)) {
        header("Location: index.php?pesan=tambah_sukses");
    } else {
        header("Location: index.php?pesan=tambah_gagal");
    }
} else if ($aksi == 'edit') {
    $id_gudang = $_POST['id_gudang'];
    $kode_gudang = $_POST['kode_gudang'];
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi = $_POST['lokasi'];
    
    if ($gudangObj->edit_data($id_gudang, $kode_gudang, $nama_gudang, $lokasi)) {
        header("Location: index.php?pesan=edit_sukses");
    } else {
        header("Location: index.php?pesan=edit_gagal");
    }
}
?>
