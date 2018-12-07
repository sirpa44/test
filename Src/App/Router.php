<?php
namespace Oat\App;

class Router
{
    /**
     * lead to the controller
     * @param $dic intance of DIC class
     * @param $parameters
     * @return array
     * @throws \Exception
     */
    public function route($dic, $parameters)
    {
        if (!isset($parameters['controller']) || !isset($parameters['method'])) {
            throw new \Exception("method or controller invalid");
        }
        $controllerClassName = ucfirst($parameters['controller']) . 'Controller';
        $controllerName = '\Oat\Controller\\' . $controllerClassName;
        if (!is_a($controllerName, $dic->get('ConfigurationManager')->get('interfaceControllerPath'), true)) {
            throw new \Exception("controller invalid");
        }
        $method = $parameters['method'];
        unset($parameters['method'], $parameters['controller']);
        $dic->set($controllerName, new $controllerName());
        return $dic->get($controllerClassName)->action($dic, $parameters, $method);
    }
}
