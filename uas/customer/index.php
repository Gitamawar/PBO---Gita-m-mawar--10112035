<?php
include '../header.php';
require_once __DIR__ . '/../class/Customer.php';
$customerObj = new Customer();
$data_customer = $customerObj->tampil_data();
?>

<div class="mb-20">
    <h2>Data Customer</h2>
    <a href="tambah.php" class="btn btn-primary" style="width: auto;">+ Tambah Data</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Customer</th>
            <th>Nama Customer</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($data_customer as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['id_customer']; ?></td>
            <td><?php echo $row['nama_customer']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['alamat_customer']; ?></td>
            <td><?php echo $row['telepon_customer']; ?></td>
            <td><?php echo $row['email_customer']; ?></td>
            <td class="action-links">
                <a href="edit.php?id=<?php echo $row['id_customer']; ?>" class="edit">Edit</a>
                <a href="hapus.php?id=<?php echo $row['id_customer']; ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>
