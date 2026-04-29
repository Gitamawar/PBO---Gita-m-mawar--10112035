<?php
class belanja {
    public $namapembeli = "Gita";
    public $namabarang = "Sampo";
    public $hargabarang = 9000;
    public $jumlahbarang = 2;
    public $diskon = 0.1;
    public static $pajak = 0.02;

    public function totalharga(): float|int {
        $subtotal = $this->hargabarang * $this->jumlahbarang;
        return $subtotal;
    }
}

// Membuat objek
$belanja1 = new belanja();

// Menampilkan isi objek dengan format rapi

echo "Nama Pembeli : " . $belanja1->namapembeli . "<br>";
echo "Nama Barang  : " . $belanja1->namabarang . "<br>";
echo "Harga Barang : Rp " . number_format($belanja1->hargabarang, 0, ',', '.') . "<br>";
echo "Jumlah       : " . $belanja1->jumlahbarang . "<br>";
echo "Diskon       : " . ($belanja1->diskon * 100) . "%<br>";
echo "-----------------------------------------------<br>";
echo "Subtotal     : Rp " . number_format($belanja1->totalharga(), 0, ',', '.') . "<br>";

?>