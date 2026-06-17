<?php
include '../header.php';
require_once __DIR__ . '/../class/User.php';
$userObj = new User();
$data_user = $userObj->tampil_data();
?>

<div class="mb-20">
    <h2>Data Pengguna</h2>
    <a href="tambah.php" class="btn btn-primary" style="width: auto;">+ Tambah Data</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Tipe User</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($data_user as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['tipe_user']; ?></td>
            <td class="action-links">
                <a href="edit.php?id=<?php echo $row['id_user']; ?>" class="edit">Edit</a>
                <a href="hapus.php?id=<?php echo $row['id_user']; ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>
