<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/User.php';

$auth = new Auth();
$auth->checkAuth();

$userObj = new User();

$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipe_user = $_POST['tipe_user'];
    
    if ($userObj->tambah_data($username, $password, $tipe_user)) {
        header("Location: index.php?pesan=tambah_sukses");
    } else {
        header("Location: index.php?pesan=tambah_gagal");
    }
} else if ($aksi == 'edit') {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password'];
    
    $password = empty($password_baru) ? $password_lama : $password_baru;
    $tipe_user = $_POST['tipe_user'];
    
    if ($userObj->edit_data($id_user, $username, $password, $tipe_user)) {
        header("Location: index.php?pesan=edit_sukses");
    } else {
        header("Location: index.php?pesan=edit_gagal");
    }
}
?>
