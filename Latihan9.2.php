<?php

//class manusia
class manusia {
    //property dengan protected
    protected $nama = "Ardi";
    var $kelas = "SI 2";

    //method protected
    protected function nama() {
        return "Nama : " . $this->nama;
    }

    //method public untuk akses nama
    public function tampilkan_nama() {
        return $this->nama();
    }

    //ubah ke public agar bisa dipanggil dari luar
    public function tampilkan_kelas() {
        return "Kelas : " . $this->kelas;
    }
}

//instansiasi class manusia
$manusia = new manusia();

//memanggil method public
echo $manusia->tampilkan_nama() . "<br />";
echo $manusia->tampilkan_kelas();
