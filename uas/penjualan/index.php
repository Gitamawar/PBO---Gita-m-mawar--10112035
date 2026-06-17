<?php
include '../header.php';
require_once __DIR__ . '/../class/Transaksi.php';
$transaksiObj = new Transaksi();
$data_penjualan = $transaksiObj->tampil_penjualan();
?>

<div class="mb-20">
    <h2>Data Transaksi Penjualan</h2>
    <a href="tambah.php" class="btn btn-primary" style="width: auto;">+ Tambah Transaksi</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>No Penjualan</th>
            <th>Tanggal</th>
            <th>Customer</th>
            <th>Total Barang</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($data_penjualan as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['no_penjualan']; ?></td>
            <td><?php echo $row['tanggal_penjualan']; ?></td>
            <td><?php echo $row['nama_customer']; ?></td>
            <td><?php echo $row['total_barangall']; ?></td>
            <td>Rp <?php echo number_format($row['total_hargaall'], 0, ',', '.'); ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>
