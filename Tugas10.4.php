<?php
// Pastikan nama file di bawah ini sama persis dengan yang ada di folder kamu
require_once "Tugas10.1.php";
require_once "Tugas10.2.php";
require_once "Tugas10.3.php";

$repo = new KendaraanRepository();
$data = $repo->getAll();

echo "<h2>DAFTAR INFORMASI KENDARAAN</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse;'>";
echo "<tr style='background-color: #eee;'>
        <th>No</th>
        <th>Merek</th>
        <th>Roda</th>
        <th>Harga</th>
        <th>Warna</th>
        <th>Bahan Bakar</th>
      </tr>";

$no = 1;
foreach ($data as $d) {
    // Membuat objek Kendaraan (Data diambil dari baris array di Tugas10.2)
    $obj = new Kendaraan($d[0], $d[1], $d[2], $d[3], $d[4]);

    echo "<tr>";
    echo "<td>" . $no++ . "</td>";
    echo "<td>" . $obj->GetMerek() . "</td>";
    echo "<td>" . $obj->GetJumlahRoda() . "</td>";
    echo "<td>" . formatRupiah($obj->GetHarga()) . "</td>";
    echo "<td>" . $obj->GetWarna() . "</td>";
    echo "<td>" . $obj->GetBhnBakar() . "</td>";
    echo "</tr>";
}
echo "</table>";
?>