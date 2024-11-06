<?php

namespace JasaTitipAngkut;

trait LoggerTrait {
    public function log($message) {
        echo "[LOG]: $message<br>";
    }
}
