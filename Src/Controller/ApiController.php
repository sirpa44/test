<?php
namespace Oat\Controller;

use Oat\Model\ApiModel;

class ApiController implements ControllerInterface
{

    /**
     * lead to service
     * @param $dic DependencyInjectionContainer
     * @param array $parameters
     * @param string $method
     * @return array
     * @throws \Exception
     */
    public function action($dic, $parameters, $method)
    {
        if (!isset($parameters['format'])) {
            throw new \Exception("format invalid");
        }
        $format = $parameters['format'];
        $userId = null;
        if (isset($parameters['id'])) {
            $userId = $parameters['id'];
        }
        return $dic->get('ApiModel')->apiService($dic, $format, $userId, $method);
    }
}