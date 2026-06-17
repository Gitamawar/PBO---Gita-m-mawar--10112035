<!DOCTYPE html>
<html>
    <head>
        <title>Membuat CRUD Dengan PHP Dan MySQL - Menambah Data dari database</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="judul">
            <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
            <h2>Menambah data dari database</h2>
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
            <form action="input-aksi.php" method="post">
                <table id="dataTable" class="table form-table">
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                <tr>
                    <td><input type="text" name="nama[]"></td>
                    <td><input type="text" name="alamat[]"></td>
                    <td><input type="text" name="pekerjaan[]"></td>
                    <td><button type="button" onclick="removeRow(this)">Hapus</button></td>
                </tr>
            </table>
            <br>
            <button type="button" onclick="addRow()">Tambah Baris</button>
            <input type="submit" value="Simpan Semua" class="button">
        </form>

        <script>
            function addRow() {
                const table = document.getElementById('dataTable');
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><input type="text" name="nama[]"></td>
                    <td><input type="text" name="alamat[]"></td>
                    <td><input type="text" name="pekerjaan[]"></td>
                    <td><button type="button" onclick="removeRow(this)">Hapus</button></td>
                `;
                table.appendChild(row);
            }
            function removeRow(button) {
                const row = button.closest('tr');
                const table = document.getElementById('dataTable');
                if (table.rows.length > 2) {
                    row.remove();
                }
            }
        </script>
        </div>
    </body>
</html>