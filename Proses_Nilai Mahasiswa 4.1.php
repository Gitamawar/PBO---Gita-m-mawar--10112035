<?php
class Mahasiswa {
    public $nama;
    public $kelas;
    public $matkul;
    public $nilai;

    // Method untuk cek kelulusan kuis
    public function cekKuis(): string {
        return $this->nilai >= 60 ? "Lulus Kuis" : "Tidak Lulus Kuis";
    }
}

// Ambil data dari form
$data = [
    "nama"   => htmlspecialchars($_POST['nama']),
    "kelas"  => htmlspecialchars($_POST['kelas']),
    "matkul" => htmlspecialchars($_POST['matkul']),
    "nilai"  => (int) $_POST['nilai']
];

// Buat objek mahasiswa
$mhs = new Mahasiswa();
$mhs->nama   = $data["nama"];
$mhs->kelas  = $data["kelas"];
$mhs->matkul = $data["matkul"];
$mhs->nilai  = $data["nilai"];

// Tampilkan hasil
echo "<h2>Data Nilai PBO Mahasiswa</h2>";
echo "Nama : " . $mhs->nama . "<br>";
echo "Kelas : " . $mhs->kelas . "<br>";
echo "Mata Kuliah : " . $mhs->matkul . "<br>";
echo "Nilai : " . $mhs->nilai . "<br>";
echo "<b>" . $mhs->cekKuis() . "</b>";
?>
