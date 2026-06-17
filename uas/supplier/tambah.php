<?php include '../header.php'; ?>

<div class="mb-20">
    <h2>Tambah Data Supplier</h2>
    <a href="index.php" class="btn btn-secondary" style="width: auto;">Kembali</a>
</div>

<div style="max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form action="aksi.php?aksi=tambah" method="POST">
        <div class="form-group">
            <label>ID Supplier</label>
            <input type="text" name="id_supplier" required>
        </div>
        <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat_supplier" required>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon_supplier" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email_supplier" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="pass_supplier" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include '../footer.php'; ?>
