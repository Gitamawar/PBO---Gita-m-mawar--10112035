<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Supplier.php';

$auth = new Auth();
$auth->checkAuth();

$supplierObj = new Supplier();
$id = $_GET['id'];

if ($supplierObj->hapus_data($id)) {
    header("Location: index.php?pesan=hapus_sukses");
} else {
    header("Location: index.php?pesan=hapus_gagal");
}
?>
