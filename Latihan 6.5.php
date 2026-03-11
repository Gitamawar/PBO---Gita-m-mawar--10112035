<?php

// Fungsi format rupiah 
function formatRupiah($angka): string{
    return "Rp ".number_format(num: $angka, decimals: 0, decimal_separator: ",", thousands_separator: ".");
}

// Definisi Class 
class BelanjaWarung{

    public $nama;
    public $barang;
    public $harga;
    public $jumlah;
    public $member;

    public function subtotal(): float|int{
        return $this->harga * $this->jumlah;
    }

    public function diskon($subtotal): int{
        $diskon = 0;

        if($this->member == true){
            // Logika diskon member 
            if($subtotal > 500000){
                $diskon = 50000;
            }
            elseif($subtotal > 100000){
                $diskon = 15000;
            }
        }
        else{
            // Logika diskon non-member
            if($subtotal > 100000){
                $diskon = 5000;
            }
        }

        return $diskon;
    }

    public function total(): float|int{
        $subtotal = $this->subtotal();
        $diskon = $this->diskon(subtotal: $subtotal);

        return $subtotal - $diskon;
    }
}

// Data Belanja 
$dataBelanja = [
    [
        "nama"=>"Gita",
        "barang"=>"Gula",
        "harga"=>65000,
        "jumlah"=>2,
        "member"=>true
    ],
    [
        "nama"=>"Hani",
        "barang"=>"Minyak",
        "harga"=>140000,
        "jumlah"=>1,
        "member"=>false
    ],
    [
        "nama"=>"Novia",
        "barang"=>"Tepung",
        "harga"=>50000,
        "jumlah"=>3,
        "member"=>true
    ]
];

// Membuat Table 
echo "<table border='1' cellpadding='6'>";
echo "<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Member</th>
    <th>Barang</th>
    <th>Subtotal</th>
    <th>Diskon</th>
    <th>Total</th>
</tr>";

$no = 1;

// Looping Data ke dalam baris tabel 
foreach($dataBelanja as $d){
    $belanja = new BelanjaWarung();

    $belanja->nama = $d["nama"];
    $belanja->barang = $d["barang"];
    $belanja->harga = $d["harga"];
    $belanja->jumlah = $d["jumlah"];
    $belanja->member = $d["member"];

    $subtotal = $belanja->subtotal();
    $diskon = $belanja->diskon(subtotal: $subtotal);
    $total = $belanja->total();

    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$belanja->nama."</td>";
    echo "<td>".($belanja->member ? "Ya" : "Tidak")."</td>";
    echo "<td>".$belanja->barang."</td>";
    echo "<td>".formatRupiah(angka: $subtotal)."</td>";
    echo "<td>".formatRupiah(angka: $diskon)."</td>";
    echo "<td>".formatRupiah(angka: $total)."</td>";
    echo "</tr>";

    $no++;
}

echo "</table>";

?>
