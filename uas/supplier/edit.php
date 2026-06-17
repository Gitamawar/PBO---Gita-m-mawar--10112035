<?php 
include '../header.php'; 
require_once __DIR__ . '/../class/Supplier.php';

$supplierObj = new Supplier();
$id = $_GET['id'];
$data = $supplierObj->get_data_by_id($id);
?>

<div class="mb-20">
    <h2>Edit Data Supplier</h2>
    <a href="index.php" class="btn btn-secondary" style="width: auto;">Kembali</a>
</div>

<div style="max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form action="aksi.php?aksi=edit" method="POST">
        <input type="hidden" name="id_supplier_lama" value="<?php echo $data['id_supplier']; ?>">
        <div class="form-group">
            <label>ID Supplier</label>
            <input type="text" name="id_supplier" value="<?php echo $data['id_supplier']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" value="<?php echo $data['nama_supplier']; ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat_supplier" value="<?php echo $data['alamat_supplier']; ?>" required>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon_supplier" value="<?php echo $data['telepon_supplier']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email_supplier" value="<?php echo $data['email_supplier']; ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="pass_supplier" value="<?php echo $data['pass_supplier']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include '../footer.php'; ?>
