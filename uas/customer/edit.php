<?php 
include '../header.php'; 
require_once __DIR__ . '/../class/Customer.php';

$customerObj = new Customer();
$id = $_GET['id'];
$data = $customerObj->get_data_by_id($id);
?>

<div class="mb-20">
    <h2>Edit Data Customer</h2>
    <a href="index.php" class="btn btn-secondary" style="width: auto;">Kembali</a>
</div>

<div style="max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form action="aksi.php?aksi=edit" method="POST">
        <input type="hidden" name="id_customer_lama" value="<?php echo $data['id_customer']; ?>">
        <div class="form-group">
            <label>ID Customer</label>
            <input type="text" name="id_customer" value="<?php echo $data['id_customer']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Customer</label>
            <input type="text" name="nama_customer" value="<?php echo $data['nama_customer']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?php echo ($data['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat_customer" value="<?php echo $data['alamat_customer']; ?>" required>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon_customer" value="<?php echo $data['telepon_customer']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email_customer" value="<?php echo $data['email_customer']; ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="pass_customer" value="<?php echo $data['pass_customer']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include '../footer.php'; ?>
