<?php

require_once __DIR__ . '/Routes/ProductRoutes.php';

use app\Routes\ProductRoutes;


$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Normalisasi path dengan menghapus '/app/Main.php'
$basePath = '/Main.php';
$path = str_replace($basePath, '/product', $path);

// Inisialisasi ProductRoutes dan tangani rute
$router = new ProductRoutes();
$router->handle($method, $path);
