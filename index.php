<?php

use Oat\App\ConfigurationManager;
use Oat\App\DependencyContainer;
use Oat\App\Router;
use Oat\Controller\ApiController;
use Oat\Model\Adapter\Csv;
use Oat\Model\Adapter\Json;
use Oat\Model\Adapter\Mysql;
use Oat\Model\ApiModel;
use Oat\Model\Factory\FormatFactory;

$configFilePath = __DIR__ . "/config/config.ini";
require __DIR__ . "/vendor/autoload.php";
$dic = new DependencyContainer();
$dic->set(ConfigurationManager::class, function () use($configFilePath) {
    return new \Oat\App\ConfigurationManager($configFilePath);
});
$dic->set(Router::class);
$dic->set(ApiController::class);
$dic->set(ApiModel::class);
$dic->set(FormatFactory::class);
$dic->set(Json::class);
$dic->set(Csv::class);
$dic->set(Mysql::class);

try {
    $data = $dic->get(Router::class)->route($_GET);
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