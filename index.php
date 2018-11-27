<?php
define('ROOT', __DIR__ . '/Src/');
require __DIR__ . "/vendor/autoload.php";

$router = new \Oat\App\Router();

try {
    $datas = $router->route($_GET);
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode($datas);
} catch (\Exception $e) {
    header("HTTP/1.0 500 Internal Server Error");
    if ($e instanceof PDOException) {
        echo 'PBM de DB : ' . $e->getMessage();
    } elseif ($e instanceof \Oat\App\Exception\DatabaseLogicException) {
        echo 'PBM de Logic DB : ' . $e->getMessage();
    } elseif ($e instanceof \Oat\App\Exception\ConfigException) {
        echo 'PBM de configuration : ' . $e->getMessage();
    } elseif ($e instanceof \Oat\App\Exception\AdapterException) {
        echo 'PBM de l\'adapter : ' . $e->getMessage();
    }
    else {
        echo $e->getMessage();
    }
}
//catch () {
//
//}