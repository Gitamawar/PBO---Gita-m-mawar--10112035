<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Customer.php';

$auth = new Auth();
$auth->checkAuth();

$customerObj = new Customer();

$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat_customer = $_POST['alamat_customer'];
    $telepon_customer = $_POST['telepon_customer'];
    $email_customer = $_POST['email_customer'];
    $pass_customer = $_POST['pass_customer'];
    
    if ($customerObj->tambah_data($id_customer, $nama_customer, $jenis_kelamin, $alamat_customer, $telepon_customer, $email_customer, $pass_customer)) {
        header("Location: index.php?pesan=tambah_sukses");
    } else {
        header("Location: index.php?pesan=tambah_gagal");
    }
} else if ($aksi == 'edit') {
    $id_customer_lama = $_POST['id_customer_lama'];
    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat_customer = $_POST['alamat_customer'];
    $telepon_customer = $_POST['telepon_customer'];
    $email_customer = $_POST['email_customer'];
    $pass_customer = $_POST['pass_customer'];
    
    if ($customerObj->edit_data($id_customer_lama, $id_customer, $nama_customer, $jenis_kelamin, $alamat_customer, $telepon_customer, $email_customer, $pass_customer)) {
        header("Location: index.php?pesan=edit_sukses");
    } else {
        header("Location: index.php?pesan=edit_gagal");
    }
}
?>
