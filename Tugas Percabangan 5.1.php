<!DOCTYPE html>
<html>
<head>
<title>Program Diskon Belanja</title>

<style>
table{
border-collapse: collapse;
margin-top:20px;
}

table, th, td{
border:1px solid black;
padding:8px;
text-align:center;
}

th{
background-color:pink;
}

</style>
</head>

<body>

<h1>Program Diskon Belanja</h1>

<form method="post">

Nama Pembeli :
<input type="text" name="nama" required>
<br><br>

Kartu Member :
<select name="member">
<option value="Memiliki">Memiliki</option>
<option value="Tidak Memiliki">Tidak Memiliki</option>
</select>

<br><br>

Total Belanja :
<input type="number" name="belanja" required>

<br><br>

Diskon (%) :
<input type="number" name="diskon" required>

<br><br>

<input type="submit" name="hitung" value="Hitung">

</form>

<?php

// CLASS
class DiskonBelanja{

    // PROPERTY
    public $nama;
    public $member;
    public $belanja;
    public $diskonPersen;

    //FUNCTION
    function hitungDiskon(){
        return ($this->belanja * $this->diskonPersen) / 100;
    }

    function totalBayar(){
        return $this->belanja - $this->hitungDiskon();
    }

}

//METHOD POST (FORM)
if(isset($_POST['hitung'])){

    $obj = new DiskonBelanja();

    // mengisi property
    $obj->nama = $_POST['nama'];
    $obj->member = $_POST['member'];
    $obj->belanja = $_POST['belanja'];
    $obj->diskonPersen = $_POST['diskon'];

    $diskon = $obj->hitungDiskon();
    $total = $obj->totalBayar();

    
   // OUTPUT
    echo "<h2>Hasil Perhitungan</h2>";

    echo "<table>

    <tr>
    <th>No</th>
    <th>Pembeli</th>
    <th>Kartu Member</th>
    <th>Total Belanja</th>
    <th>Diskon (%)</th>
    <th>Jumlah Diskon</th>
    <th>Biaya yang dikeluarkan</th>
    </tr>

    <tr>
    <td>1</td>
    <td>$obj->nama</td>
    <td>$obj->member</td>
    <td>$obj->belanja</td>
    <td>$obj->diskonPersen %</td>
    <td>$diskon</td>
    <td>$total</td>
    </tr>

    </table>";
}

?>

</body>
</html>

program gitaa_