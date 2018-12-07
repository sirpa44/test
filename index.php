<?php

use Oat\App\ConfigurationManager;
use Oat\App\DIC;
use Oat\App\Router;

define('ROOT', __DIR__ . '/Src/');
$configFilePath = __DIR__ . "/config/config.ini";
require __DIR__ . "/vendor/autoload.php";
$dic = new DIC();
$dic->set('ConfigurationManager', function () use($configFilePath) {
    return new ConfigurationManager($configFilePath);
});
$dic->set(Router::class);

try {
    $data = $dic->get('Router')->route($dic, $_GET);
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (\Exception $e) {
    header("HTTP/1.0 500 Internal Server Error");
    if ($e instanceof \Oat\App\Exception\DatabaseLogicException) {
        echo 'Logic Database problem : ' . $e->getMessage();
    } elseif ($e instanceof \Oat\App\Exception\ConfigException) {
        echo 'Configuration problem : ' . $e->getMessage();
    } elseif ($e instanceof \Oat\App\Exception\AdapterException) {
        echo 'Adapter problem : ' . $e->getMessage();
    } else {
        echo $e->getMessage();
    }
}