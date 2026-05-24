<?php 
// 1. Hubungkan dengan file koneksi database
include "koneksi.php";

// 2. Proses eksekusi jika tombol "Simpan" diklik
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];

    // Input data ke tabel user
    $query = mysqli_query($koneksi, "INSERT INTO user (nama, alamat, pekerjaan) VALUES ('$nama', '$alamat', '$pekerjaan')");

    if ($query) {
        // Jika berhasil, redirect ke index.php dengan pesan sukses
        header("location:index.php?pesan=input");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error spesifik dari MySQL untuk mempermudah debugging
        die("Gagal menambahkan data! <br><b>Pesan Error MySQL:</b> " . mysqli_error($koneksi));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Tambah Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">		
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
        <h2>Input data baru</h2>
    </div>
    
    <br/>
    <a class="tombol" href="index.php"><- Kembali ke Home</a>
    <br/><br/>

    <h3>Input data baru</h3>
    <form action="" method="post">		
        <table class="table">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>					
            </tr>	
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>					
            </tr>	
            <tr>
                <td>Pekerjaan</td>
                <td><input type="text" name="pekerjaan" required></td>					
            </tr>	
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Simpan"></td>					
            </tr>				
        </table>
    </form>
</body>
</html>