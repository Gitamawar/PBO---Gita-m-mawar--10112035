<?php
// Fungsi untuk format Rupiah
function formatRupiah($angka): string {
    return "Rp " . number_format(
        num: $angka,
        decimals: 0,
        decimal_separator: ',',
        thousands_separator: '.'
    );
}

// Class Produk dengan properti dan method OOP
class Produk {
    public $nama;
    public $harga;

    // Hitung subtotal = harga x jumlah
    public function hitungSubtotal($jumlah): float|int {
        return $this->harga * $jumlah;
    }

    // Hitung diskon berdasarkan persen
    public function hitungDiskon($subtotal, $persenDiskon): float|int {
        return ($persenDiskon / 100) * $subtotal;
    }

    // Hitung total bayar = subtotal - diskon
    public function hitungTotal($jumlah, $persenDiskon): float|int {
        $subtotal = $this->hitungSubtotal(jumlah: $jumlah);
        $diskon = $this->hitungDiskon(subtotal: $subtotal, persenDiskon: $persenDiskon);
        return $subtotal - $diskon;
    }
}

// Proses data dari form