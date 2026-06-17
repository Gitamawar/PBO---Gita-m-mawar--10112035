<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/User.php';

$auth = new Auth();
$auth->checkAuth();

$userObj = new User();
$id = $_GET['id'];

if ($userObj->hapus_data($id)) {
    header("Location: index.php?pesan=hapus_sukses");
} else {
    header("Location: index.php?pesan=hapus_gagal");
}
?>
