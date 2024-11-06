<?php

namespace JasaTitipAngkut;

require_once 'Controller/Layanan.php';
require_once 'Traits/LoggerTrait.php';

class JasaTitip extends Layanan {
    use LoggerTrait;

    private $maksBarang;

    public function __construct($namaLayanan, $harga, $maksBarang) {
        parent::__construct($namaLayanan, $harga);
        $this->maksBarang = $maksBarang;
    }

    public function deskripsi() {
        return "Layanan {$this->namaLayanan} dengan maksimal {$this->maksBarang} barang, harga Rp{$this->harga}.<br>";
    }
}
