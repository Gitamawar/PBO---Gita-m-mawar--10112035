<?php
include '../header.php';
require_once __DIR__ . '/../class/Transaksi.php';
$transaksiObj = new Transaksi();
$data_pembelian = $transaksiObj->tampil_pembelian();
?>

<div class="mb-20">
    <h2>Data Transaksi Pembelian</h2>
    <a href="tambah.php" class="btn btn-primary" style="width: auto;">+ Tambah Transaksi</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>No Pembelian</th>
            <th>Tanggal</th>
            <th>Supplier</th>
            <th>Total Barang</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($data_pembelian as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['no_pembelian']; ?></td>
            <td><?php echo $row['tanggal_pembelian']; ?></td>
            <td><?php echo $row['nama_supplier']; ?></td>
            <td><?php echo $row['total_barangall']; ?></td>
            <td>Rp <?php echo number_format($row['total_hargaall'], 0, ',', '.'); ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>
