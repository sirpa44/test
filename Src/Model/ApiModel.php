<?php
namespace Oat\Model;

use Exception;
use Oat\Model\Factory\FormatFactory;

class ApiModel
{


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
        $factory = new FormatFactory();
        $adapterInstance = $factory->getFormatInstance($format);
        return $adapterInstance->$method($userId);
    }

}