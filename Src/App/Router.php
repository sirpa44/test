<?php
namespace Aot\App;


class Router
{

    /**
     * lead to the controller
     * @param $parameters
     * @return array
     * @throws \Exception
     */
    public function route($parameters)
    {
        if (isset($parameters['controller']) && isset($parameters['method'])) {
            $controllerClassName = ucfirst($parameters['controller']) . 'Controller';
            $controllerName = '\Aot\Controller\\' . $controllerClassName;
            $method = $parameters['method'];
        } else {
            throw new \Exception("method or controller invalid");
        }
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            unset($parameters['method'], $parameters['controller']);
            return $controller->action($parameters, $method);
        } else {
            throw new \Exception("controller invalid");
        }

    }

}
 