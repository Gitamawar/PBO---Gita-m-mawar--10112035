<?php

// Membuat Class
class Buah {

    // Property
    public $daftarBuah = [];

    // Constructor
    public function __construct($buah){
        $this->daftarBuah = $buah;
    }

    // Method untuk menampilkan buah
    public function tampilkanBuah(){
        foreach($this->daftarBuah as $b){
            echo $b."<br>";
        }
    }

}

// Membuat Array Buah
$dataBuah = ["Apel","Jeruk","Mangga"];

// Membuat Objek
$objekBuah = new Buah($dataBuah);

// Memanggil Method
$objekBuah->tampilkanBuah();

?>