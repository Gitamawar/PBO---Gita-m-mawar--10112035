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
    $where .= " AND (p.no_pembelian LIKE '%$searchEsc%' OR s.nama_supplier LIKE '%$searchEsc%' OR b.nama_barang LIKE '%$searchEsc%' OR dp.kd_barang LIKE '%$searchEsc%')";
}
if ($from !== '') {
    $fromEsc = $koneksi->real_escape_string($from);
    $where .= " AND p.tanggal_pembelian >= '$fromEsc'";
}
if ($to !== '') {
    $toEsc = $koneksi->real_escape_string($to);
    $where .= " AND p.tanggal_pembelian <= '$toEsc'";
}

$query = "SELECT p.no_pembelian, p.tanggal_pembelian, s.nama_supplier, b.nama_barang, dp.jumlah_barang, dp.harga_barang, dp.total_harga 
          FROM tb_pembelian p 
          JOIN detail_pembelian dp ON p.no_pembelian = dp.no_pembelian 
          LEFT JOIN tb_supplier s ON p.id_supplier = s.id_supplier 
          LEFT JOIN tb_barang b ON dp.kd_barang = b.kd_barang 
          WHERE $where 
          ORDER BY p.tanggal_pembelian DESC";

$result = $koneksi->query($query);
?>

<div class="mb-20">
    <h2>Laporan Transaksi Pembelian</h2>
    <button onclick="window.print()" class="btn btn-secondary" style="width: auto;">Print Laporan</button>
</div>

<div class="filter-box" style="margin-bottom: 20px; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
    <form method="GET" action="pembelian.php" style="display: flex; gap: 12px; flex-wrap: wrap; align-items: flex-end;">
        <div style="flex: 1; min-width: 220px;">
            <label>Cari</label>
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="No Pembelian / Supplier / Barang" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
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
            <a href="pembelian.php" class="btn btn-secondary" style="height: 42px; display: inline-flex; align-items: center; justify-content: center;">Reset</a>
        </div>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>No Pembelian</th>
            <th>Tanggal</th>
            <th>Supplier</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $grand_total = 0;
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $grand_total += $row['total_harga'];
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['no_pembelian']; ?></td>
            <td><?php echo $row['tanggal_pembelian']; ?></td>
            <td><?php echo $row['nama_supplier']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['jumlah_barang']; ?></td>
            <td>Rp <?php echo number_format($row['harga_barang'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
        </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="8" class="text-center">Tidak ada data pembelian.</td></tr>';
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="7" style="text-align: right;">Total Pembelian</th>
            <th>Rp <?php echo number_format($grand_total, 0, ',', '.'); ?></th>
        </tr>
    </tfoot>
</table>

<?php include '../footer.php'; ?>