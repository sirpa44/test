<?php
namespace Aot\App;


class Router
{
    private $interfaceControllerPath = '\Aot\Controller\ControllerInterface';

    /**
     * lead to the controller
     * @param $parameters
     * @return array
     * @throws \Exception
     */
    public function route($parameters)
    {
        if (!isset($parameters['controller']) || !isset($parameters['method'])) {
            throw new \Exception("method or controller invalid");
        }
        $controllerClassName = ucfirst($parameters['controller']) . 'Controller';
        $controllerName = '\Aot\Controller\\' . $controllerClassName;
        $method = $parameters['method'];
        if (!class_exists($controllerName)) {
            throw new \Exception("controller invalid");
        }
        $controller = new $controllerName();
        unset($parameters['method'], $parameters['controller']);
        if (!is_a($controller, $this->interfaceControllerPath)) {
            throw new \Exception("controller invalid");
        }
        return $controller->action($parameters, $method);
    }
}