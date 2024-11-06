<?php

namespace JasaTitipAngkut;

require_once 'Controller/Layanan.php';
require_once 'Traits/LoggerTrait.php';

class JasaAngkut extends Layanan {
    use LoggerTrait;

    private $kapasitas;

    public function __construct($namaLayanan, $harga, $kapasitas) {
        parent::__construct($namaLayanan, $harga);
        $this->kapasitas = $kapasitas;
    }

    public function deskripsi() {
        return "Layanan {$this->namaLayanan} dengan kapasitas {$this->kapasitas} kg, harga Rp{$this->harga}.<br>";
    }
}
