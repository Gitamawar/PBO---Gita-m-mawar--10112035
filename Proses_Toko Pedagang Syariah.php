<?php
// Data
$pinjaman = 1000000;
$bunga_persen = 10; // %
$lama_angsuran = 5; // bulan
$terlambat_hari = 40; // hari
$denda_persen_perhari = 0.15; // % per hari

// Perhitungan
$bunga = ($bunga_persen / 100) * $pinjaman;
$total_pinjaman = $pinjaman + $bunga;

$angsuran = $total_pinjaman / $lama_angsuran;

// Denda dihitung dari angsuran
$denda = ($denda_persen_perhari / 100) * $angsuran * $terlambat_hari;

$total_bayar = $angsuran + $denda;

// Output
echo "<h2>TOKO PEGADAIAN SYARIAH</h2>";
echo "Jl Keadilan No 16 <br>";
echo "Telp. 72353459 <br><br>";

echo "<h3>Program Penghitung Besaran Angsuran Hutang</h3>";

echo "Besaran Pinjaman : Rp. " . number_format($pinjaman,0,",",".") . "<br>";
echo "Masukan besar bunga (%) : " . $bunga_persen . "%<br>";
echo "Total Pinjaman : Rp. " . number_format($total_pinjaman,0,",",".") . "<br>";
echo "Lama angsuran (bulan) : " . $lama_angsuran . "<br>";
echo "Besaran angsuran : Rp. " . number_format($angsuran,0,",",".") . "<br><br>";

echo "<h3>Keterlambatan Angsuran</h3>";
echo "Keterlambatan (Hari) : " . $terlambat_hari . "<br>";
echo "Denda Keterlambatan : Rp. " . number_format($denda,0,",",".") . "<br>";
echo "Besaran Pembayaran : Rp. " . number_format($total_bayar,0,",",".") . "<br>";
?>