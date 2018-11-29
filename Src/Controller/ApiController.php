<?php
namespace Oat\Controller;

use Oat\Model\ApiModel;

class ApiController implements ControllerInterface
{

    /**
     * lead to service
     * @param array $parameters
     * @param string $method
     * @return array
     * @throws \Exception
     */
    public function action($parameters, $method)
    {
        if (!isset($parameters['format'])) {
            throw new \Exception("format invalid");
        }
        $format = $parameters['format'];
        $model = new ApiModel();
        if (isset($parameters['id'])) {
            $id = $parameters['id'];
        } else {
            $id = null;
        }
        return $model->apiService($format, $id, $method);
    }
}