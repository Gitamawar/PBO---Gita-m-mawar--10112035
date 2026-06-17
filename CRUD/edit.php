<!DOCTYPE html>
<html>
    <head>
        <title>Membuat CRUD Dengan PHP Dan MySQL - Edit Data dari database</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="judul">
            <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
            <h2>Edit data dari database</h2>
        </div>
        <nav class="menu">
            <div class="container">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <a href="#">Data Master</a>
                        <ul>
                            <li><a href="index.php">Data User</a></li>
                            <li><a href="#">Data Barang</a></li>
                            <li><a href="#">Data Customer</a></li>
                            <li><a href="#">Data Supplier</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Data Transaksi</a>
                        <ul>
                            <li><a href="#">Transaksi Pembelian</a></li>
                            <li><a href="#">Transaksi Penjualan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Laporan</a>
                        <ul>
                            <li><a href="#">Laporan Data Barang</a></li>
                            <li><a href="#">Laporan Data Customer</a></li>
                            <li><a href="#">Laporan Data Supplier</a></li>
                            <li><a href="#">Laporan Transaksi Pembelian</a></li>
                            <li><a href="#">Laporan Transaksi Penjualan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <br/>
            <a class="tombol" href="index.php">Kembali</a>
            <br/>
            <br/>
        <?php
        include "koneksi.php";

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo '<p>ID tidak valid.</p>';
            exit;
        }

        $id = intval($_GET['id']);
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'") or die(mysqli_error($koneksi));
        if (mysqli_num_rows($query_mysql) == 0) {
            echo '<p>Data tidak ditemukan.</p>';
            exit;
        }

        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>
            <form action="update.php" method="post">
                <table class="form-table">
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td><input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <input type="submit" value="Simpan" class="button"></td>
                    </tr>
                </table>

            </form>

        <?php } ?>
        </div>
    </body>
</html>