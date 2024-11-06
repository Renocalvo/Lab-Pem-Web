<?php

namespace JasaTitipAngkut;

abstract class Layanan {
    protected $namaLayanan;
    protected $harga;

    public function __construct($namaLayanan, $harga) {
        $this->namaLayanan = $namaLayanan;
        $this->harga = $harga;
    }

    abstract public function deskripsi();
}
