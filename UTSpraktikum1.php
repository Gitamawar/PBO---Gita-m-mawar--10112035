<?php

class Mahasiswa {
    public $nama;
    public $nilai;

    // Constructor
    public function __construct($nama, $nilai) {
        $this->nama = $nama;
        $this->nilai = $nilai;
    }
    // Method hitung nilai
    public function hitungGrade() {

        if ($this->nilai >= 85) {
            return "A";
        } elseif ($this->nilai >= 70) {
            return "B";
        } elseif ($this->nilai >= 60) {
            return "C";
        } else {
            return "D";
        }
    }
}

//Aray data mahasiswa
$dataMahasiswa = [];

// Perulangan menu
while (true) {

    echo "\n===== MENU NILAI =====\n";
    echo "1. Tampilkan Data Nilai\n";
    echo "2. Tambah Data\n";
    echo "3. Update Nilai\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu : ";

    $pilih = trim(fgets(STDIN));

    switch ($pilih) {

        // Tampilkan Data
        case 1:

            echo "\nTampilan Data Nilai\n";
            echo "-----------------------------------\n";
            echo "No | Nama | Nilai | Grade\n";
            echo "-----------------------------------\n";

            if (count($dataMahasiswa) == 0) {

                echo "Data masih kosong.\n";

            } else {

                foreach ($dataMahasiswa as $index => $mhs) {

                    echo ($index + 1) . " | "
                        . $mhs->nama . " | "
                        . $mhs->nilai . " | "
                        . $mhs->hitungGrade() . "\n";
                }
            }

            break;

            //Tamabah Data 
             case 2:

            echo "\nTambah Data\n";

            echo "Masukkan nama : ";
            $nama = trim(fgets(STDIN));

            echo "Masukkan nilai : ";
            $nilai = trim(fgets(STDIN));

            $dataMahasiswa[] = new Mahasiswa($nama, $nilai);

            echo "Data berhasil ditambahkan!\n";

            break;

            //Update Data
            case 3:

            echo "\nUpdate Nilai\n";

            if (count($dataMahasiswa) == 0) {

                echo "Data masih kosong.\n";

            } else {

                foreach ($dataMahasiswa as $index => $mhs) {

                    echo ($index + 1) . ". "
                        . $mhs->nama
                        . " (" . $mhs->nilai . ")\n";
                }

                echo "Pilih nomor mahasiswa : ";
                $nomor = trim(fgets(STDIN));

                if (isset($dataMahasiswa[$nomor - 1])) {

                    echo "Masukkan nilai baru : ";
                    $nilaiBaru = trim(fgets(STDIN));

                    $dataMahasiswa[$nomor - 1]->nilai = $nilaiBaru;

                    echo "Nilai berhasil diupdate!\n";

                } else {

                    echo "Nomor tidak ditemukan!\n";
                }
            }

            break;

            // Hapus Data
            case 4:

            echo "\nHapus Data\n";

            if (count($dataMahasiswa) == 0) {

                echo "Data masih kosong.\n";

            } else {

                foreach ($dataMahasiswa as $index => $mhs) {

                    echo ($index + 1) . ". "
                        . $mhs->nama . "\n";
                }

                echo "Pilih nomor mahasiswa : ";
                $nomor = trim(fgets(STDIN));

                if (isset($dataMahasiswa[$nomor - 1])) {

                    unset($dataMahasiswa[$nomor - 1]);

                    // Rapikan index array
                    $dataMahasiswa = array_values($dataMahasiswa);

                    echo "Data berhasil dihapus!\n";

                } else {

                    echo "Nomor tidak ditemukan!\n";
                }
            }

            break;

            //Keluar
            case 5:

            echo "Program selesai.\n";
            exit;

        default:

            echo "Menu tidak tersedia!\n";
    }
}

?>


