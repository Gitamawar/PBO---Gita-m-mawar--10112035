<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Barang.php';

$auth = new Auth();
$auth->checkAuth();

$barangObj = new Barang();
$id = $_GET['id'];

if ($barangObj->hapus_data($id)) {
    header("Location: index.php?pesan=hapus_sukses");
} else {
    header("Location: index.php?pesan=hapus_gagal");
}
?>
