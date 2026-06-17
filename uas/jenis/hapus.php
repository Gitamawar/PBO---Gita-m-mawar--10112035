<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Gudang.php';

$auth = new Auth();
$auth->checkAuth();

$gudangObj = new Gudang();
$id = $_GET['id'];

if ($gudangObj->hapus_data($id)) {
    header("Location: index.php?pesan=hapus_sukses");
} else {
    header("Location: index.php?pesan=hapus_gagal");
}
?>
