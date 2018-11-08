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
        $controllerClassName = ucfirst($parameters['controller']) . 'Controller';
        if (isset($parameters['controller']) && isset($parameters['method'])) {
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
 