<?php
class KonversiSuhu {
    public $celcius;

    // Constructor
    public function __construct($c) {
        $this->celcius = $c;
    }

    // Method konversi
    public function hitung() {
        $hasil = array();

        // Array jenis suhu
        $jenis = ["Kelvin", "Reamur", "Fahrenheit"];

        // Perulangan
        foreach ($jenis as $j) {

            // Percabangan
            if ($j == "Kelvin") {
                $hasil[$j] = $this->celcius + 273.15;
            } elseif ($j == "Reamur") {
                $hasil[$j] = $this->celcius * 4/5;
            } elseif ($j == "Fahrenheit") {
                $hasil[$j] = ($this->celcius * 9/5) + 32;
            }
        }

        return $hasil;
    }
}

// Ambil nilai dari GET
$c = isset($_GET['celcius']) ? $_GET['celcius'] : 0;

// Buat objek
$obj = new KonversiSuhu($c);
$hasil = $obj->hitung();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu</title>
</head>
<body>

<h2>Konversi Suhu dari Celcius</h2>

<form method="GET">
    Masukkan suhu (Celcius): 
    <input type="number" name="celcius" required>
    <button type="submit">Konversi</button>
</form>

<br>

<?php if(isset($_GET['celcius'])) { ?>
    <p>suhu dalam celcius = <?php echo $c; ?> derajat</p>
    <p>suhu dalam kelvin = <?php echo $hasil['Kelvin']; ?> derajat</p>
    <p>suhu dalam reamur = <?php echo $hasil['Reamur']; ?> derajat</p>
    <p>suhu dalam fahrenheit = <?php echo $hasil['Fahrenheit']; ?> derajat</p>

    <i>Sekian konversi suhu yang bisa dilakukan</i>
<?php } ?>

</body>
</html>