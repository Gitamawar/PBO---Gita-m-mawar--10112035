<?php
class kendaraan
{
var $jumlahRoda;
var $warna;
var $bahanBakar;
var$harga;
var $merek;
var $tahunPembuatan;

function statusHarga()
{
if ($this->harga > 50000000)
$status = 'Mahal';
else $status = 'Murah';
return $status;
}
function statusBBM()
{
if ($this->bahanBakar == "Premium")
$status = 'BBM Bersubsidi';
else $status = 'BBM Non Subsidi';
return $status;
}
function hargaBekas()
{
$harga = $this->harga * 0.9;
return $harga;
}
}
$objekKendaraan1 = new kendaraan();
$objekKendaraan1->merek= "Yamaha MIO";//set properti
$objekKendaraan1->harga=10000000;//set properti
$objekKendaraan1->bahanBakar="BBM Bersubsidi";//set properti
$objekKendaraan1->tahunPembuatan=2015;//set properti
$objekKendaraan1->jumlahRoda=2;//set properti
$objekKendaraan1->warna="Hitam";//set properti

$objekKendaraan2 = new kendaraan();
$objekKendaraan2->merek= "Toyota Avanza";//set properti
$objekKendaraan2->harga=100000000;//set properti
$objekKendaraan2->bahanBakar="BBM Non Subsidi";//set properti
$objekKendaraan2->tahunPembuatan=2020;//set properti
$objekKendaraan2->jumlahRoda=4;//set properti
$objekKendaraan2->warna="Putih";//set properti


echo "Merek: ".$objekKendaraan1->merek; //Merek:Toyota Avanza
echo "<br>";
echo "Nominal Harga: ".$objekKendaraan1->harga;// Nominal
echo "<br>";
echo "Status Harga Kendaraan: ".$objekKendaraan1->statusHarga();//Status Harga Kendaraan : Murah
echo "<br>";
echo "Harga Bekas Kendaraan: ".$objekKendaraan1->hargaBekas();
echo "<br>";
echo "Status BBM Kendaraan: ".$objekKendaraan1->statusBBM();
echo "<br>";
echo "Warna Kendaraan: ".$objekKendaraan1->warna;
echo "<br>";
echo "Jumlah Roda Kendaraan: ".$objekKendaraan1->jumlahRoda;
echo "<br>";

echo "Merek: ".$objekKendaraan2->merek; //Merek:Toyota Avanza
echo "<br>";
echo "Nominal Harga: ".$objekKendaraan2->harga;// Nominal
echo "<br>";
echo "Status Harga Kendaraan: ".$objekKendaraan2-> statusHarga();//Status Harga Kendaraan : Mahal
echo "<br>";
echo "Harga Bekas Kendaraan: ".$objekKendaraan2->hargaBekas();
echo "<br>";
echo "Status BBM Kendaraan: ".$objekKendaraan2->statusBBM();
echo "<br>";
echo "Warna Kendaraan: ".$objekKendaraan2->warna;
echo "<br>";
echo "Jumlah Roda Kendaraan: ".$objekKendaraan2->jumlahRoda;
echo "<br>";
?>

