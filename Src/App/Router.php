<?php
namespace Oat\App;

class Router
{
    private $dependencyContainer;

    public function __construct($dependencyContainer)
    {
        $this->dependencyContainer = $dependencyContainer;
    }

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
        $controller = $this->dependencyContainer->get($parameters['controller']);
        if (!is_a(
            $controller,
            $this->dependencyContainer->get(ConfigurationManager::class)->get('interfaceControllerPath'),
            true)) {
            throw new \Exception("controller invalid");
        }
        $method = $parameters['method'];
        unset($parameters['method'], $parameters['controller']);
        return $controller->action($parameters, $method);
    }
}