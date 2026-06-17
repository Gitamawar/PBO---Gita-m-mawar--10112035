<?php
include '../header.php';
require_once __DIR__ . '/../class/Supplier.php';
$supplierObj = new Supplier();
$data_supplier = $supplierObj->tampil_data();
?>

<div class="mb-20">
    <h2>Data Supplier</h2>
    <a href="tambah.php" class="btn btn-primary" style="width: auto;">+ Tambah Data</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($data_supplier as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['id_supplier']; ?></td>
            <td><?php echo $row['nama_supplier']; ?></td>
            <td><?php echo $row['alamat_supplier']; ?></td>
            <td><?php echo $row['telepon_supplier']; ?></td>
            <td><?php echo $row['email_supplier']; ?></td>
            <td class="action-links">
                <a href="edit.php?id=<?php echo $row['id_supplier']; ?>" class="edit">Edit</a>
                <a href="hapus.php?id=<?php echo $row['id_supplier']; ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>
