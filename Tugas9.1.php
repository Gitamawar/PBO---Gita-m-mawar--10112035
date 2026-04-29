<?php
// Class UangTabungan
class UangTabungan {
    private $saldo;

    public function __construct($saldoAwal) {
        $this->saldo = $saldoAwal;
    }

    public function setor($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            echo "Setor tunai Rp$jumlah berhasil\n";
        } else {
            echo "Jumlah setor harus lebih dari 0\n";
        }
    }

    public function tarik($jumlah) {
        if ($jumlah > 0 && $jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            echo "Tarik tunai Rp$jumlah berhasil\n";
        } else {
            echo "Tarik tunai gagal. Saldo tidak cukup\n";
        }
    }

    public function tampilkanSaldo() {
        echo "Saldo saat ini = Rp{$this->saldo}\n";
    }
}

// --- Program Utama ---
$tabungan = new UangTabungan(50000); // saldo awal Rp50.000

while (true) {
    echo "\n=== Menu Tabungan Sekolah ===\n";
    echo "1. Setor Tunai\n";
    echo "2. Tarik Tunai\n";
    echo "Pilih menu (1-2): ";

    $pilihan = trim(fgets(STDIN));

    if ($pilihan == "1") {
        echo "Masukkan jumlah setor: ";
        $setor = (int)trim(fgets(STDIN));
        $tabungan->setor($setor);
        $tabungan->tampilkanSaldo();
    } elseif ($pilihan == "2") {
        echo "Masukkan jumlah tarik: ";
        $tarik = (int)trim(fgets(STDIN));
        $tabungan->tarik($tarik);
        $tabungan->tampilkanSaldo();
    } else {
        echo "Pilihan tidak valid, coba lagi.\n";
    }
}
?>
