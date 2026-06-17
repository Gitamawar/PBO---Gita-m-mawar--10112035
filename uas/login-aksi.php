<?php
require_once __DIR__ . '/class/Auth.php';

$auth = new Auth();

$username = $_POST['username'];
$password = $_POST['password'];

if ($auth->login($username, $password)) {
    header("Location: beranda.php");
} else {
    header("Location: index.php?pesan=gagal");
}
?>
