<?php
//properties
class Kendaraan
{
    // deklarasi properti
    public $jumlahRoda;
    public $warna;
    public $bahanBakar;
    public $harga;
    public $merek;
    public $tahunPembuatan;

    // setter dan getter untuk merek
    public function setMerek($x){
        $this->merek = $x;
    }

    public function getMerek(){
        return $this->merek;
    }

    // setter dan getter untuk harga
    public function setHarga($y){
        $this->harga = $y;
    }

    public function getHarga(){
        return $this->harga;
    }
}

// objek
$kendaraan1 = new Kendaraan();
$kendaraan1->setMerek('Yamaha Mio');
$kendaraan1->setHarga(10000000);

// tampilkan hasil
echo $kendaraan1->getMerek();
echo "<br>";
echo $kendaraan1->getHarga();
?>
