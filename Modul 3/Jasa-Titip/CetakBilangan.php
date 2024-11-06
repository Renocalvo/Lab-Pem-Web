<?php

function cetakBilangan($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "Pemrograman Website 2024" . PHP_EOL;
        } elseif ($i % 5 == 0) {
            echo "2024" . PHP_EOL;
        } elseif ($i % 4 == 0) {
            echo "Pemrograman" . PHP_EOL;
        } elseif ($i % 6 == 0) {
            echo "Website" . PHP_EOL;
        } else {
            echo $i . PHP_EOL;
        }
    }
}

// Meminta input jumlah bilangan yang akan dicetak dari pengguna
echo "Masukkan jumlah bilangan yang ingin dicetak: ";
$n = (int)trim(fgets(STDIN)); // Mengambil input dari terminal
cetakBilangan($n);

?>
