<?php
// class
class employee {
    public $nama;
    public $gaji;
    public $masaKerja;

    public function __construct($nama, $gaji, $masaKerja){
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->masaKerja = $masaKerja;
    }

    public function getGaji(){
        return $this->gaji;
    }

    public function getInfo(){
        return "Nama: $this->nama – Gaji: Rp " . number_format($this->getGaji(),0,",",".");
    }
}

// programer
class Programmer extends Employee {
    public function getGaji(){
        if($this->masaKerja < 1){
            return parent::getGaji();
        } elseif($this->masaKerja <= 10){
            return parent::getGaji() + ($this->masaKerja * 0.01 * parent::getGaji());
        } else {
            return parent::getGaji() + ($this->masaKerja * 0.02 * parent::getGaji());
        }
    }
}

// direktur
class Direktur extends Employee {
    public function getGaji(){
        $bonus = $this->masaKerja * 0.5 * parent::getGaji();
        $tunjangan = $this->masaKerja * 0.1 * parent::getGaji();
        return parent::getGaji() + $bonus + $tunjangan;
    }
}

// pegawai mingguan
class PegawaiMingguan extends Employee {
    public $hargaBarang;
    public $stokBarang;
    public $terjual;

    public function __construct($nama, $gaji, $masaKerja, $hargaBarang, $stokBarang, $terjual){
        parent::__construct($nama, $gaji, $masaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stokBarang = $stokBarang;
        $this->terjual = $terjual;
    }

    public function getGaji(){
        $persentase = $this->terjual / $this->stokBarang;
        if($persentase > 0.7){
            $bonus = $this->terjual * (0.10 * $this->hargaBarang);
        } else {
            $bonus = $this->terjual * (0.03 * $this->hargaBarang);
        }
        return parent::getGaji() + $bonus;
    }
}

// --- penggunaan ---
$p1 = new Programmer("Andi", 5000000, 5);
$p2 = new Direktur("Budi", 10000000, 12);
$p3 = new PegawaiMingguan("Citra", 3000000, 2, 100000, 100, 80);

echo "<h3>Programmer</h3>";
echo $p1->getInfo()."<br>";
echo "<h3>Direktur</h3>";
echo $p2->getInfo()."<br>";
echo "<h3>Pegawai Mingguan</h3>";
echo $p3->getInfo()."<br>";
?>
