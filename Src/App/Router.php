<?php
namespace Oat\App {


    class Router
    {
        private $interfaceControllerPath = '\Oat\Controller\ControllerInterface';

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
            $controllerName = '\Oat\Controller\\' . $controllerClassName;
            if (!is_a($controllerName, $this->interfaceControllerPath, true)) {
                throw new \Exception("controller invalid");
            }
            $method = $parameters['method'];
            $controller = new $controllerName();
            unset($parameters['method'], $parameters['controller']);
            return $controller->action($parameters, $method);
        }
    }
}