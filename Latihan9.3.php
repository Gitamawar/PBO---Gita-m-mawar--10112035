<?php

// class komputer
class komputer {

    // property dengan hak akses
    private $jenis_processor = "Intel Core i7-4790 3.6Ghz";
    protected $jenis_RAM = "DDR 4";
    public $jenis_VGA = "PCI Express";

    // method public untuk akses processor
    public function tampilkan_processor() {
        return $this->jenis_processor;
    }

    public function tampilkan_jenisprocessor() {
        return $this->jenis_processor;
    }

    // method public untuk akses RAM
    public function tampilkan_ram() {
        return $this->jenis_RAM;
    }

    // method protected untuk VGA
    protected function tampilkan_vga() {
        return $this->jenis_VGA;
    }

    // method public untuk akses VGA
    public function tampilkan_vga2() {
        return $this->jenis_VGA;
    }
}

// class laptop
class laptop extends komputer {

    // akses processor lewat method public
    public function display_processor() {
        return $this->tampilkan_processor();
    }

    public function display_processor2() {
        return $this->tampilkan_jenisprocessor();
    }

    // akses RAM lewat property protected
    public function display_ram() {
        return $this->tampilkan_ram();
    }

    // akses VGA lewat method public
    public function display_vga() {
        return $this->tampilkan_vga2();
    }
}

// objek dari class laptop (instansiasi)
$komputer = new komputer();
$laptop = new laptop();

// output method dari class komputer dan laptop
echo "Line 61 : " . $komputer->tampilkan_processor() . "<br />";
echo "Line 62 : " . $laptop->display_processor() . "<br />";
echo "Line 63 : " . $laptop->display_processor2() . "<br />";
echo "Line 64 : " . $komputer->tampilkan_jenisprocessor() . "<br />";
echo "Line 65 : " . $laptop->display_ram() . "<br />";
echo "Line 66 : " . $laptop->display_vga() . "<br />";
?>
