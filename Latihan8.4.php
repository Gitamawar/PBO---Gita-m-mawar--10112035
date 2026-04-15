<?php
if (php_sapi_name() === 'cli') {
    echo "Dari mana Anda berasal: ";
    $asal = trim(fgets(STDIN));
    echo "Oh, dari $asal ya\n";
    return;
}

$asal = $_POST['asal'] ?? null;
if (!$asal) {
    echo '<form method="post">
        <label>Dari mana Anda berasal: <input type="text" name="asal" required autofocus></label>
        <button type="submit">Kirim</button>
    </form>';
    return;
}

$asal = htmlspecialchars($asal, ENT_QUOTES, 'UTF-8');
echo "Oh, dari $asal ya";
