<?php
include '../header.php';
require_once __DIR__ . '/../class/Gudang.php';
$gudangObj = new Gudang();
$data_gudang = $gudangObj->tampil_data();
?>

<div class="mb-20">
    <h2>Data Gudang</h2>
    <a href="tambah.php" class="btn btn-primary" style="width: auto;">+ Tambah Data</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Gudang</th>
            <th>Nama Gudang</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($data_gudang as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['kode_gudang']; ?></td>
            <td><?php echo $row['nama_gudang']; ?></td>
            <td><?php echo $row['lokasi']; ?></td>
            <td class="action-links">
                <a href="edit.php?id=<?php echo $row['id_gudang']; ?>" class="edit">Edit</a>
                <a href="hapus.php?id=<?php echo $row['id_gudang']; ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>
