<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: beranda.php");
    exit;
}

$base_url = 'http://localhost/si_gudang/uas/';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Stok Gudang Barang</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="login-body">

    <div class="login-container">
        <div class="login-logo-area">
            <i class="fa-solid fa-boxes-stacked"></i>
        </div>
        
        <h2>Sistem Informasi Stok</h2>
        <h3>Politeknik Negeri Subang</h3>

        <div class="login-divider"></div>
        
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<div class='alert alert-danger'><i class='fa-solid fa-circle-exclamation'></i> Login gagal! Username atau password salah.</div>";
            } else if ($_GET['pesan'] == "logout") {
                echo "<div class='alert alert-success'><i class='fa-solid fa-circle-check'></i> Anda telah berhasil logout.</div>";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "<div class='alert alert-danger'><i class='fa-solid fa-circle-exclamation'></i> Anda harus login terlebih dahulu.</div>";
            }
        }
        ?>

        <form action="login-aksi.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <div class="input-icon-wrapper">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="Masukkan username..." required>
                </div>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <div class="input-icon-wrapper">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Masukkan password..." required>
                </div>
            </div>
            
            <div class="button-group">
                <button type="submit" class="btn btn-login">Masuk Aplikasi</button>
                <button type="reset" class="btn btn-reset">Reset</button>
            </div>
        </form>
    </div>

</body>
</html>