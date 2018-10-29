<?php
namespace Aot\App;


class Router
{

    /**
     * lead to the controller
     * @param $parameters
     * @return mixed
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
        } else {
            throw new \Exception("controller invalid");
        }
        if (is_callable($method, $controllerClassName)) {
            unset($parameters['method'], $parameters['controller']);
            return $controller->$method($parameters);
            } else {
            throw new \Exception("method invalid");
        }
    }

}
 