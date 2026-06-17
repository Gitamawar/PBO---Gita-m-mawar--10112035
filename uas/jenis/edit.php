<?php 
include '../header.php'; 
require_once __DIR__ . '/../class/Gudang.php';

$gudangObj = new Gudang();
$id = $_GET['id'];
$data = $gudangObj->get_data_by_id($id);
?>

<div class="mb-20">
    <h2>Edit Data Gudang</h2>
    <a href="index.php" class="btn btn-secondary" style="width: auto;">Kembali</a>
</div>

<div style="max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form action="aksi.php?aksi=edit" method="POST">
        <input type="hidden" name="id_gudang" value="<?php echo $data['id_gudang']; ?>">
        <div class="form-group">
            <label>Kode Gudang</label>
            <input type="text" name="kode_gudang" value="<?php echo $data['kode_gudang']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Gudang</label>
            <input type="text" name="nama_gudang" value="<?php echo $data['nama_gudang']; ?>" required>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" value="<?php echo $data['lokasi']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include '../footer.php'; ?>
