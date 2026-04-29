<?php

class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;

    // Constructor
    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
    }

    // Method getGajiPokok
    public function getGajiPokok() {
        $gaji = [
            "Ib" => 1250000,
            "Ic" => 1300000,
            "Id" => 1350000,
            "IIa" => 2000000,
            "IIb" => 2100000,
            "IIc" => 2200000,
            "IId" => 2300000,
            "IIIa" => 2400000,
            "IIIb" => 2500000,
            "IIIc" => 2600000,
            "IIId" => 2700000,
            "IVa" => 2800000,
            "IVb" => 2900000,
            "IVc" => 3000000,
            "IVd" => 3100000
        ];

        return $gaji[$this->golongan] ?? 0;
    }

    // Hitung total gaji
    public function getTotalGaji() {
        $lembur = $this->jamLembur * 15000;
        return $this->getGajiPokok() + $lembur;
    }

    // Destructor
    public function __destruct() {
        // otomatis dipanggil saat objek dihapus
        // echo "Objek {$this->nama} dihapus\n";
    }
}

// Array data
$data = [];

// Function tampilkan data
function tampilkanData($data) {
    echo "\n===== DATA GAJI KARYAWAN =====\n";
    echo "No | Nama | Golongan | Jam Lembur | Total Gaji\n";

    foreach ($data as $i => $k) {
        echo ($i+1) . " | {$k->nama} | {$k->golongan} | {$k->jamLembur} | Rp " . number_format($k->getTotalGaji(),0,",",".") . "\n";
    }
}

// Menu
do {
    echo "\n===== MENU GAJI KARYAWAN =====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";
    $pilih = trim(fgets(STDIN));

    switch ($pilih) {
        case 1:
            tampilkanData($data);
            break;

        case 2:
            echo "Nama: ";
            $nama = trim(fgets(STDIN));
            echo "Golongan: ";
            $gol = trim(fgets(STDIN));
            echo "Jam Lembur: ";
            $jam = trim(fgets(STDIN));

            $data[] = new Karyawan($nama, $gol, $jam);
            echo "Data berhasil ditambahkan!\n";
            break;

        case 3:
            tampilkanData($data);
            echo "Pilih nomor yang diupdate: ";
            $i = trim(fgets(STDIN)) - 1;

            if (isset($data[$i])) {
                echo "Nama baru: ";
                $data[$i]->nama = trim(fgets(STDIN));
                echo "Golongan baru: ";
                $data[$i]->golongan = trim(fgets(STDIN));
                echo "Jam lembur baru: ";
                $data[$i]->jamLembur = trim(fgets(STDIN));
                echo "Data berhasil diupdate!\n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        case 4:
            tampilkanData($data);
            echo "Pilih nomor yang dihapus: ";
            $i = trim(fgets(STDIN)) - 1;

            if (isset($data[$i])) {
                unset($data[$i]);
                $data = array_values($data); // rapikan index
                echo "Data berhasil dihapus!\n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        case 5:
            echo "Keluar program...\n";
            break;

        default:
            echo "Menu tidak valid!\n";
    }

} while ($pilih != 5);

?>