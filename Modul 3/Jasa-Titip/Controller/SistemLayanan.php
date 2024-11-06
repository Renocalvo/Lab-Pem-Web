<?php

namespace JasaTitipAngkut;

class SistemLayanan {
    public $layanan = [];  // Ubah menjadi public

    public function tambahLayanan(Layanan $layanan) {
        $this->layanan[] = $layanan;
    }

    public function tampilkanLayanan() {
        if (empty($this->layanan)) {
            echo "Belum ada layanan yang tersedia.<br>";
        } else {
            foreach ($this->layanan as $layanan) {
                echo $layanan->deskripsi();
            }
        }
    }
}

