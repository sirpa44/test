<?php
define('ROOT', __DIR__);

require ROOT . '/app/App.php';

app\App::load();

$router = new app\Router();

try {
    $datas = $router->method($_GET);
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode($datas);
} catch (\Exception $e) {
    header("HTTP/1.0 500 Internal Server Error");
}
