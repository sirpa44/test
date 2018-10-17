<?php
namespace Aot\Controller;

use Aot\Model\ApiModel;

class ApiController
{
    /**
     * lead to the service
     * @param $parameters
     * @return array
     * @throws \Exception
     */
    public function show($parameters)
    {
        if (array_key_exists('format', $parameters)) {
            $format = $parameters['format'];
        }
        $model = new ApiModel();
        if (array_key_exists('id', $parameters)) {
            $id = $parameters['id'];
        } else {
            $id = null;
        }
        return $model->apiService($format, $id);
    }
}