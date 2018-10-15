<?php
namespace Aot\Controller;

use Aot\Model\StrategyModel;

class ApiController
{
    /**
     * lead to the service
     * @param $parameters
     * @return array
     * @throws \Exception
     */
    public function sendToService($parameters)
    {
        if (array_key_exists('format', $parameters) && array_key_exists('method', $parameters)) {
            $format = $parameters['format'];
            $method = $parameters['method'];
        }
        $model = new StrategyModel();
        if (array_key_exists('id', $parameters)) {
            $id = $parameters['id'];
            return $model->apiService($format, $method, $id);
        }
        return $model->apiService($format, $method);
    }
}