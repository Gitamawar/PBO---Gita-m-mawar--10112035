<?php
class Mahasiswa {

    public $dataMahasiswa = [];
    // Constructor untuk mengisi array
    public function __construct() {
        $this->dataMahasiswa = [
            [
                "nama" => "Aditya",
                "kelas" => "SI 2",
                "matkul" => "Pemrograman Berorientasi Objek",
                "nilai" => 80
            ],
            [
                "nama" => "Shinta",
                "kelas" => "SI 2",
                "matkul" => "Pemrograman Berorientasi Objek",
                "nilai" => 75
            ],
            [
                "nama" => "Ineu",
                "kelas" => "SI 2",
                "matkul" => "Pemrograman Berorientasi Objek",
                "nilai" => 55
            ]
        ];
    }

    // Method untuk menentukan kelulusan
    public function keterangan($nilai) {
        if ($nilai >= 75) {
            return "Lulus Kuis";
        } else {
            return "Tidak Lulus Kuis";
        }
    }

    // Method untuk menampilkan data
    public function tampilData() {
        foreach ($this->dataMahasiswa as $mhs) {
            echo "Nama : " . $mhs["nama"] . "<br>";
            echo "Kelas : " . $mhs["kelas"] . "<br>";
            echo "Mata Kuliah : " . $mhs["matkul"] . "<br>";
            echo "Nilai : " . $mhs["nilai"] . "<br>";
            echo $this->keterangan($mhs["nilai"]);
            echo "<hr>";
        }
    }
}

// Membuat objek
$mahasiswa = new Mahasiswa();
$mahasiswa->tampilData();
?>