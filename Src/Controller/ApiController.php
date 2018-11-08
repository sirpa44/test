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
    public function action($parameters, $method)
    {
        if (isset($parameters['format'])) {
            $format = $parameters['format'];
        } else {
            throw new \Exception("format invalid ");
        }
        $model = new ApiModel();
        if (isset($parameters['id'])) {
            $id = $parameters['id'];
        } else {
            $id = null;
        }
        return $model->apiService($format, $id, $method);
    }
}