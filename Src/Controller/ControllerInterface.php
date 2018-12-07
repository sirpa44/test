<?php
namespace Oat\Controller;


interface ControllerInterface
{

    /**
     * lead to service
     * @param $dic Dependency Injection Container
     * @param array $parameters
     * @param string $method
     * @return array
     */
    public function action($dic, $parameters, $method);
}