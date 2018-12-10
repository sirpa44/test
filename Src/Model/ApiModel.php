<?php
namespace Oat\Model;

use Exception;
use Oat\Model\Factory\FormatFactory;

class ApiModel
{
    private $dependencyContainer;

    public function __construct($dependencyContainer)
    {
        $this->dependencyContainer = $dependencyContainer;
    }

    /**
     * call the factory and call the adapter
     * @param string $format
     * @param $userId
     * @param string $method
     * @return array
     * @throws \Exception
     */
    public function apiService($format, $userId, $method)
    {
        if (!is_callable($method, $format)) {
            throw new Exception("method invalid");
        }
        $adapterInstance = $this->dependencyContainer->get(FormatFactory::class)->getFormatInstance($format);
        return $adapterInstance->$method($userId);
    }

}