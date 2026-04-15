<?php
class manusia{
    //property
    var $nama;
    var $warna;

    //method construct dijalankan pertama kali
    function __construct(){
        echo "ini adalah isi method construct <br/>";
    }

    //method destruct dijalankan terakhir
    function __destruct(){
        echo "ini adalah isi method destruct <br/>";
    }

    //method manusia
    function tampilkan_nama(){
        return "Nama Gita mahasiswa SI <br/>";
    }
}

//instansiasi class manusia
$manusia = new manusia();

//memanggil method tampilkan_nama dari class manusia
echo $manusia->tampilkan_nama();
?>