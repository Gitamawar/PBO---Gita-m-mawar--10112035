<?php
session_start();

class Mahasiswa {

    //  Properti
    public $nama;
    public $kelas;
    public $matkul;
    public $nilai;

    //  Constructor
    public function __construct($nama, $kelas, $matkul, $nilai){
        $this->nama = $nama;
        $this->kelas = $kelas;
        $this->matkul = $matkul;
        $this->nilai = $nilai;
    }

    //  Method
    public function cekKelulusan(){
        return ($this->nilai >= 70) ? "Lulus Kuis" : "Tidak Lulus Kuis";
    }
}

// Simpan data
if(isset($_POST['simpan'])){

    //  Membuat objek
    $mhs = new Mahasiswa(
        $_POST['nama'],
        $_POST['kelas'],
        $_POST['matkul'],
        $_POST['nilai']
    );

    $_SESSION['mahasiswa'][] = $mhs;
}

// Reset data
if(isset($_POST['reset'])){
    session_unset();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Latihan Array OOP</title>
</head>
<body>

<h2>Nilai Mahasiswa</h2>

<form method="POST">
    Nama: <input type="text" name="nama" required><br><br>
    Kelas: <input type="text" name="kelas" required><br><br>
    Mata Kuliah: <input type="text" name="matkul" required><br><br>
    Nilai: <input type="number" name="nilai" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
    <button type="submit" name="reset" formnovalidate>Reset</button>
</form>

<hr>

<?php
if(isset($_SESSION['mahasiswa'])){
    foreach($_SESSION['mahasiswa'] as $mhs){
        echo "Nama : " . $mhs->nama . "<br><br>";
        echo "Kelas : " . $mhs->kelas . "<br><br>";
        echo "Mata Kuliah : " . $mhs->matkul . "<br><br>";
        echo "Nilai : " . $mhs->nilai . "<br><br>";
        echo $mhs->cekKelulusan();
        echo "<hr>";
    }
}
?>

</body>
</html>