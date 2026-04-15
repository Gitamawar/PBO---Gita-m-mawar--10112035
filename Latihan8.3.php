<?php

echo "Masukkan username:";
$input_name = fopen("php://stdin","r");
$username = trim(fgets($input_name));

echo "Welcome $username, apa kabar?\n";
?>