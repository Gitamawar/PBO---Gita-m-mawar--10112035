<?php
require_once __DIR__ . '/class/Auth.php';
$auth = new Auth();
$auth->checkAuth();

$base_url = 'http://localhost/si_gudang/uas/';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Stok Gudang Barang</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="dashboard-container">
    
    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-boxes-stacked"></i> <span>Sales Stock</span>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo $base_url; ?>/beranda.php">
                    <i class="fa-solid fa-house"></i> Beranda
                </a>
            </li>
            
            <li class="menu-section">Kelola Data</li>
            <li><a href="<?php echo $base_url; ?>/jenis/index.php"><i class="fa-solid fa-warehouse"></i> Data Gudang</a></li>
            <li><a href="<?php echo $base_url; ?>/barang/index.php"><i class="fa-solid fa-box"></i> Data Barang</a></li>
            <li><a href="<?php echo $base_url; ?>/user/index.php"><i class="fa-solid fa-users"></i> Data Pengguna</a></li>
            <li><a href="<?php echo $base_url; ?>/customer/index.php"><i class="fa-solid fa-user-tag"></i> Data Customer</a></li>
            <li><a href="<?php echo $base_url; ?>/supplier/index.php"><i class="fa-solid fa-truck"></i> Data Supplier</a></li>
            
            <li class="menu-section">Kelola Transaksi</li>
            <li><a href="<?php echo $base_url; ?>/pembelian/index.php"><i class="fa-solid fa-arrow-down-long"></i> Pembelian</a></li>
            <li><a href="<?php echo $base_url; ?>/penjualan/index.php"><i class="fa-solid fa-arrow-up-long"></i> Penjualan</a></li>
            
            <li class="menu-section">Kelola Laporan</li>
            <li><a href="<?php echo $base_url; ?>/laporan/barang.php"><i class="fa-solid fa-file-lines"></i> Laporan Barang</a></li>
            <li><a href="<?php echo $base_url; ?>/laporan/pembelian.php"><i class="fa-solid fa-file-import"></i> Laporan Pembelian</a></li>
            <li><a href="<?php echo $base_url; ?>/laporan/index.php"><i class="fa-solid fa-file-export"></i> Laporan Penjualan</a></li>
            
            <li class="logout-item">
                <a href="<?php echo $base_url; ?>/logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </li>
        </ul>
    </aside>

    <div class="main-layout">
        <header class="top-header">
            <div class="header-title">Sistem Informasi Logistik & Stok</div>
            <div class="user-profile"><i class="fa-solid fa-circle-user"></i> Admin</div>
        </header>
        
        <div class="main-content">