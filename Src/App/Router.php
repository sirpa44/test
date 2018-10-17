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

        if ($parameters['controller'] && $parameters['method']) {
            $controlerName = '\Aot\Controller\\' . ucfirst($parameters['controller']) . 'Controller';
            $method = $parameters['method'];
        } else {
            throw new \Exception("method or controller invalid");
        }
        if (class_exists($controlerName)) {
            $controller = new $controlerName();
        } else {
            throw new \Exception("controller invalid");
        }
        if (method_exists($controller, $method)) {
                unset($parameters['method'], $parameters['controller']);
                return $controller->$method($parameters);
            } else {
            throw new \Exception("method invalid");
        }
    }

}
 