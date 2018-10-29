<?php
define('ROOT', __DIR__ . '/Src/');
require __DIR__ . "/vendor/autoload.php";

$router = new \Aot\App\Router();

try {
    $datas = $router->route($_GET);
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode($datas);
} catch (\Exception $e) {
    header("HTTP/1.0 500 Internal Server Error");
}