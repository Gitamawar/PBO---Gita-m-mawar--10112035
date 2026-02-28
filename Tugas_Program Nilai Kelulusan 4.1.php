<?php
// Latihan Array - Program Data Nilai PBO Mahasiswa
// Class Mahasiswa
class Mahasiswa {
    // Properti 
    private $nama;
    private $kelas;
    private $matakuliah;
    private $nilai;

    // Konstruktor
    public function __construct($nama, $kelas, $matakuliah, $nilai) {
        $this->nama = $nama;
        $this->kelas = $kelas;
        $this->matakuliah = $matakuliah;
        $this->nilai = $nilai;
    }

    // Getter & Setter
    public function getNama() { return $this->nama; }
    public function setNama($nama) { $this->nama = $nama; }

    public function getKelas() { return $this->kelas; }
    public function setKelas($kelas) { $this->kelas = $kelas; }

    public function getMatakuliah() { return $this->matakuliah; }
    public function setMatakuliah($matakuliah) { $this->matakuliah = $matakuliah; }

    public function getNilai() { return $this->nilai; }
    public function setNilai($nilai) { $this->nilai = $nilai; }

    // Method untuk menentukan status kuis
    public function cekKuis() {
        return ($this->nilai >= 70) ? "Lulus Kuis" : "Tidak Lulus Kuis";
    }

    // Method untuk menampilkan data mahasiswa
    public function tampilkanData() {
        echo "Nama: " . $this->getNama() . "<br>";
        echo "Kelas: " . $this->getKelas() . "<br>";
        echo "Mata Kuliah: " . $this->getMatakuliah() . "<br>";
        echo "Nilai: " . $this->getNilai() . "<br>";
        echo $this->cekKuis() . "<br><br>";
    }
}

// class Turunan MahasiswaPBO 
class MahasiswaPBO extends Mahasiswa {
    // Method tambahan khusus untuk mahasiswa PBO
    public function infoTambahan() {
        echo "Mahasiswa ini sedang mengambil mata kuliah PBO.<br><br>";
    }

    // Polimorfisme: menimpa (override) method tampilkanData
    public function tampilkanData() {
        parent::tampilkanData(); // panggil method dari kelas mahasiswa
        $this->infoTambahan();   // tambahkan informasi tambahan
    }
}

// Membuat array berisi objek MahasiswaPBO
$mahasiswa = [
    new MahasiswaPBO("Aditya", "SI 2", "Pemrograman Berorientasi Objek", 80),
    new MahasiswaPBO("Shinta", "SI 2", "Pemrograman Berorientasi Objek", 75),
    new MahasiswaPBO("Ineu", "SI 2", "Pemrograman Berorientasi Objek", 55)
];

// Output program
echo "<h2>Latihan Array - Program Data Nilai PBO Mahasiswa</h2>";

foreach ($mahasiswa as $mhs) {
    $mhs->tampilkanData();
}
?>
