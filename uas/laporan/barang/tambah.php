<?php 
include '../header.php'; 
require_once __DIR__ . '/../class/Jenis.php';
$jenisObj = new Jenis();
$data_jenis = $jenisObj->tampil_data();
?>

<div class="mb-20">
    <h2>Tambah Data Barang</h2>
    <a href="index.php" class="btn btn-secondary" style="width: auto;">Kembali</a>
</div>

<div style="max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form action="aksi.php?aksi=tambah" method="POST">
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kd_barang" required>
        </div>
        <div class="form-group">
            <label>Jenis Barang</label>
            <select name="kode_jenis" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
                <option value="">Pilih Jenis</option>
                <?php foreach($data_jenis as $j) { ?>
                    <option value="<?php echo $j['kode_jenis']; ?>"><?php echo $j['jenis']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" required>
        </div>
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" required>
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include '../footer.php'; ?>
