<?php
namespace Aot\App;

use Aot\Controller\ApiController;

class Router
{

    /**
     * lead to the controller
     * @param $parameters
     */
    public function route($parameters)
    {
        $controller = new ApiController();
        return $controller->sendToService($parameters);
    }

}
