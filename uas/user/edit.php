<?php 
include '../header.php'; 
require_once __DIR__ . '/../class/User.php';

$userObj = new User();
$id = $_GET['id'];
$data = $userObj->get_data_by_id($id);
?>

<div class="mb-20">
    <h2>Edit Data Pengguna</h2>
    <a href="index.php" class="btn btn-secondary" style="width: auto;">Kembali</a>
</div>

<div style="max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form action="aksi.php?aksi=edit" method="POST">
        <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $data['username']; ?>" required>
        </div>
        <div class="form-group">
            <label>Password (Biarkan kosong jika tidak ingin diubah)</label>
            <input type="password" name="password" placeholder="Kosongkan jika tidak ubah password">
            <input type="hidden" name="password_lama" value="<?php echo $data['password']; ?>">
        </div>
        <div class="form-group">
            <label>Tipe User</label>
            <select name="tipe_user" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
                <option value="">Pilih Tipe</option>
                <option value="admin" <?php echo ($data['tipe_user'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="staff" <?php echo ($data['tipe_user'] == 'staff') ? 'selected' : ''; ?>>Staff</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include '../footer.php'; ?>
