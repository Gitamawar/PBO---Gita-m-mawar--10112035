<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Customer.php';

$auth = new Auth();
$auth->checkAuth();

$customerObj = new Customer();
$id = $_GET['id'];

if ($customerObj->hapus_data($id)) {
    header("Location: index.php?pesan=hapus_sukses");
} else {
    header("Location: index.php?pesan=hapus_gagal");
}
?>
