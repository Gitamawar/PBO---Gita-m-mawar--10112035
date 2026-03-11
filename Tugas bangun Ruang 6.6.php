<?php

class BangunRuang{

    // Property
    public $jenis;
    public $sisi;
    public $jari;
    public $tinggi;

    // Constructor
    public function __construct($jenis,$sisi,$jari,$tinggi){
        $this->jenis = $jenis;
        $this->sisi = $sisi;
        $this->jari = $jari;
        $this->tinggi = $tinggi;
    }

    // Method menghitung volume
    public function hitungVolume(){

        switch($this->jenis){

            case "Bola":
                $volume = (4/3) * pi() * pow($this->jari,3);
            break;

            case "Kerucut":
                $volume = (1/3) * pi() * pow($this->jari,2) * $this->tinggi;
            break;

            case "Limas Segi Empat":
                $volume = (1/3) * pow($this->sisi,2) * $this->tinggi;
            break;

            case "Kubus":
                $volume = pow($this->sisi,3);
            break;

            case "Tabung":
                $volume = pi() * pow($this->jari,2) * $this->tinggi;
            break;

            default:
                $volume = 0;

        }

        return $volume;

    }

}

// Array data bangun ruang
$dataBangun = [
    ["Bola",0,7,0],
    ["Kerucut",0,14,10],
    ["Limas Segi Empat",8,0,24],
    ["Kubus",30,0,0],
    ["Tabung",0,7,10]
];

?>

<h2>Tabel Volume Bangun Ruang</h2>

<table border="1" cellpadding="10" cellspacing="0">

<tr bgcolor="pink" style="color:black">
    <th>Jenis Bangun Ruang</th>
    <th>Sisi</th>
    <th>Jari-jari</th>
    <th>Tinggi</th>
    <th>Volume</th>
</tr>

<?php

// Perulangan
foreach($dataBangun as $bangun){

    // Membuat objek
    $obj = new BangunRuang($bangun[0],$bangun[1],$bangun[2],$bangun[3]);

    echo "<tr>";
    echo "<td>".$bangun[0]."</td>";
    echo "<td>".$bangun[1]."</td>";
    echo "<td>".$bangun[2]."</td>";
    echo "<td>".$bangun[3]."</td>";
    echo "<td>".$obj->hitungVolume()."</td>";
    echo "</tr>";
}

?>

</table>