<?php 
include '../header.php'; 
require_once __DIR__ . '/../class/Supplier.php';
require_once __DIR__ . '/../class/Barang.php';

$supplierObj = new Supplier();
$data_supplier = $supplierObj->tampil_data();

$barangObj = new Barang();
$data_barang = $barangObj->tampil_data();
?>

<div class="mb-20">
    <h2>Tambah Transaksi Pembelian</h2>
    <a href="index.php" class="btn btn-secondary" style="width: auto;">Kembali</a>
</div>

<div style="max-width: 600px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form action="aksi.php?aksi=tambah" method="POST">
        <div class="form-group">
            <label>No Pembelian</label>
            <input type="text" name="no_pembelian" value="PEMB-<?php echo time(); ?>" required readonly style="background: #eee;">
        </div>
        <div class="form-group">
            <label>Tanggal Pembelian</label>
            <input type="date" name="tanggal_pembelian" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="form-group">
            <label>Supplier</label>
            <select name="id_supplier" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
                <option value="">Pilih Supplier</option>
                <?php foreach($data_supplier as $s) { ?>
                    <option value="<?php echo $s['id_supplier']; ?>"><?php echo $s['nama_supplier']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <h3 style="margin-top: 20px; font-size: 16px;">Detail Barang</h3>
        <div class="form-group">
            <label>Barang</label>
            <select name="kd_barang" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
                <option value="">Pilih Barang</option>
                <?php foreach($data_barang as $b) { ?>
                    <option value="<?php echo $b['kd_barang']; ?>"><?php echo $b['nama_barang']; ?> (Harga Beli: Rp <?php echo number_format($b['harga_beli'],0,',','.'); ?>)</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah Barang</label>
            <input type="number" name="jumlah_barang" required min="1">
        </div>
        <div class="form-group">
            <label>Harga Beli Satuan (Override)</label>
            <input type="number" name="harga_beli" placeholder="Kosongkan jika ingin pakai harga beli default barang" min="1">
            <small style="color: #666;">Isi jika ada perubahan harga dari supplier.</small>
        </div>
        
        <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Simpan Transaksi</button>
    </form>
</div>

<?php include '../footer.php'; ?>
