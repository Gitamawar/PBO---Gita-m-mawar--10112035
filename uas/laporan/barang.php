<?php
include '../header.php';
require_once __DIR__ . '/../class/Database.php';

$db = new Database();
$koneksi = $db->getConnection();

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$from = isset($_GET['from']) ? trim($_GET['from']) : '';
$to = isset($_GET['to']) ? trim($_GET['to']) : '';

$where = '1=1';
if ($search !== '') {
    $searchEsc = $koneksi->real_escape_string($search);
    $where .= " AND (b.kd_barang LIKE '%$searchEsc%' OR b.nama_barang LIKE '%$searchEsc%' OR j.jenis LIKE '%$searchEsc%' OR b.kode_jenis LIKE '%$searchEsc%')";
}
if ($from !== '') {
    $fromEsc = $koneksi->real_escape_string($from);
    $where .= " AND p.tanggal_pembelian >= '$fromEsc'";
}
if ($to !== '') {
    $toEsc = $koneksi->real_escape_string($to);
    $where .= " AND p.tanggal_pembelian <= '$toEsc'";
}

$query = "SELECT b.kd_barang, b.kode_jenis, j.jenis, b.nama_barang, b.stok, b.harga_beli, b.harga_jual, 
                 MAX(p.tanggal_pembelian) AS tanggal_terakhir_pembelian 
          FROM tb_barang b 
          LEFT JOIN tb_jenis j ON b.kode_jenis = j.kode_jenis 
          LEFT JOIN detail_pembelian dp ON b.kd_barang = dp.kd_barang 
          LEFT JOIN tb_pembelian p ON dp.no_pembelian = p.no_pembelian 
          WHERE $where 
          GROUP BY b.kd_barang 
          ORDER BY b.kd_barang ASC";

$result = $koneksi->query($query);
?>

<div class="mb-20">
    <h2>Laporan Data Barang</h2>
    <button onclick="window.print()" class="btn btn-secondary" style="width: auto;">Print Laporan</button>
</div>

<div class="filter-box" style="margin-bottom: 20px; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form method="GET" action="barang.php" style="display: flex; gap: 12px; flex-wrap: wrap; align-items: flex-end;">
        <div style="flex: 1; min-width: 220px;">
            <label>Cari</label>
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Nama / Kode / Jenis" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="min-width: 160px;">
            <label>Dari Tanggal</label>
            <input type="date" name="from" value="<?php echo htmlspecialchars($from); ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="min-width: 160px;">
            <label>Sampai Tanggal</label>
            <input type="date" name="to" value="<?php echo htmlspecialchars($to); ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="display: flex; gap: 8px;">
            <button type="submit" class="btn btn-primary" style="height: 42px;">Filter</button>
            <a href="barang.php" class="btn btn-secondary" style="height: 42px; display: inline-flex; align-items: center; justify-content: center;">Reset</a>
        </div>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Jenis</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Tanggal Pembelian Terakhir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['kd_barang']; ?></td>
            <td><?php echo $row['jenis']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td>Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
            <td><?php echo $row['tanggal_terakhir_pembelian'] ?: '-'; ?></td>
        </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="8" class="text-center">Tidak ada data barang.</td></tr>';
        }
        ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>