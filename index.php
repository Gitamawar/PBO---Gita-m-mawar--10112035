<?php
// Letakkan koneksi di paling atas agar variabel $koneksi langsung terbaca secara global
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
        <h2>Menampilkan data dari database</h2>
    </div>

    <div class="navbar">
        <a href="index.php">Home</a>
        
        <div class="dropdown">
            <button class="dropbtn">Data Master</button>
            <div class="dropdown-content">
                <a href="#">Data User</a>
                <a href="#">Data Barang</a>
                <a href="#">Data Customer</a>
                <a href="#">Data Supplier</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Data Transaksi</button>
            <div class="dropdown-content">
                <a href="#">Transaksi Pembelian</a>
                <a href="#">Transaksi Penjualan</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Laporan</button>
            <div class="dropdown-content">
                <a href="#">Laporan Data Barang</a>
                <a href="#">Laporan Data Customer</a>
                <a href="#">Laporan Data Supplier</a>
                <a href="#">Laporan Transaksi Pembelian</a>
                <a href="#">Laporan Transaksi Penjualan</a>
            </div>
        </div>
    </div>
    <br/>

    <?php
    if(isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if($pesan == "input"){
            echo "<p style='color: green; font-weight: bold;'>Data berhasil di input.</p>";
        }else if($pesan == "update"){
            echo "<p style='color: green; font-weight: bold;'>Data berhasil di update.</p>";
        }else if($pesan == "hapus"){
            echo "<p style='color: green; font-weight: bold;'>Data berhasil di hapus.</p>";
        }
    }
    ?>
    <br/>
    <a class="tombol" href="input.php">+ Tambah Data Baru</a>

    <h3>Data user</h3>
    <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Opsi</th>
        </tr>
        <?php
        // Implementasi Exception Handling (Try-Catch)
        try {
            $query_mysql = mysqli_query($koneksi, "SELECT * FROM user");
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)){
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['pekerjaan']; ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> | 
                    <a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>
            <?php 
            }
        } catch (Exception $e) {
            echo "<tr><td colspan='5' style='color:red; text-align:center; font-weight:bold;'>Gagal memuat data: " . $e->getMessage() . "</td></tr>";
        }
        ?>
    </table>
</body>
</html>