<?php
define('ROOT', __DIR__ . '/Src/');
require __DIR__ . "/vendor/autoload.php";

$controller = new Aot\Controller\PostController();

try {
    $datas = $controller->isEmptySettings($_GET);
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode($datas);
} catch (\Exception $e) {
    header("HTTP/1.0 500 Internal Server Error");
}