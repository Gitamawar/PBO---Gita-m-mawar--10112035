<?php
include '../header.php';
require_once __DIR__ . '/../class/Barang.php';
$barangObj = new Barang();
$data_barang = $barangObj->tampil_data();
?>

<div class="mb-20">
    <h2>Data Barang</h2>
    <a href="tambah.php" class="btn btn-primary" style="width: auto;">+ Tambah Data</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Jenis Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($data_barang as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['kd_barang']; ?></td>
            <td><?php echo $row['jenis']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td>Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
            <td class="action-links">
                <a href="edit.php?id=<?php echo $row['kd_barang']; ?>" class="edit">Edit</a>
                <a href="hapus.php?id=<?php echo $row['kd_barang']; ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>
