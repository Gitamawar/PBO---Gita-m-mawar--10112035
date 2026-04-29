<?php

class KalkulatorSuhu {
    public float $suhu; // dalam Celsius

    // Celsius ke Fahrenheit
    public function cToF(): float {
        return ($this->suhu * 9/5) + 30;
    }

    // Celsius ke Kelvin
    public function cToK(): float {
        return $this->suhu + 273.15;
    }
}


// ================== DATA ==================
$kalkulator = new KalkulatorSuhu();
$kalkulator->suhu = 32;


// ================== OUTPUT ==================
echo "<pre>";

echo "================ KALKULATOR SUHU ================\n";
echo "Satuan   : Celsius (°C)\n";
echo "-------------------------------------------------\n";
echo "SUHU (C)   : " . $kalkulator->suhu . "\n";
echo "FAHRENHEIT : " . $kalkulator->cToF() . "\n";
echo "KELVIN     : " . $kalkulator->cToK() . "\n";
echo "=================================================\n";

echo "</pre>";

?>