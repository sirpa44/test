<?php
namespace Aot\Controller;


interface ControllerInterface
{

    /**
     * lead to service
     * @param array $parameters
     * @param string $method
     * @return array
     */
    public function action($parameters, $method);
}