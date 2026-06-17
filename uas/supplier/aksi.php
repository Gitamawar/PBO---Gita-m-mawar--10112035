<?php
require_once __DIR__ . '/../class/Auth.php';
require_once __DIR__ . '/../class/Supplier.php';

$auth = new Auth();
$auth->checkAuth();

$supplierObj = new Supplier();

$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $telepon_supplier = $_POST['telepon_supplier'];
    $email_supplier = $_POST['email_supplier'];
    $pass_supplier = $_POST['pass_supplier'];
    
    if ($supplierObj->tambah_data($id_supplier, $nama_supplier, $alamat_supplier, $telepon_supplier, $email_supplier, $pass_supplier)) {
        header("Location: index.php?pesan=tambah_sukses");
    } else {
        header("Location: index.php?pesan=tambah_gagal");
    }
} else if ($aksi == 'edit') {
    $id_supplier_lama = $_POST['id_supplier_lama'];
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $telepon_supplier = $_POST['telepon_supplier'];
    $email_supplier = $_POST['email_supplier'];
    $pass_supplier = $_POST['pass_supplier'];
    
    if ($supplierObj->edit_data($id_supplier_lama, $id_supplier, $nama_supplier, $alamat_supplier, $telepon_supplier, $email_supplier, $pass_supplier)) {
        header("Location: index.php?pesan=edit_sukses");
    } else {
        header("Location: index.php?pesan=edit_gagal");
    }
}
?>
