<?php
require_once __DIR__ . '/class/Auth.php';
$auth = new Auth();
$auth->logout();
header("Location: index.php?pesan=logout");
?>
