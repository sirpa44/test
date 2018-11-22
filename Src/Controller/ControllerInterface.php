<?php
namespace Oat\Controller;


interface ControllerInterface
{

    /**
     * lead to service
     * @param string $method
     * @return array
     */
    public function action($parameters, $method);
}