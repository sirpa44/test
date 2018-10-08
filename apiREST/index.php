<?php
require "../vendor/autoload.php";

$app = App\App();

$router = new App\Router();

try {
    $datas = $router->method($_GET);
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode($datas);
} catch (\Exception $e) {
    header("HTTP/1.0 500 Internal Server Error");
}