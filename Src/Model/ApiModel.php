<?php
namespace Aot\Model;

use Aot\Model\Factory\FormatFactory;

class ApiModel
{


    /**
     * call the factory and call the adapter
     * @param string $format
     * @param string $id
     * @param string $method
     * @return array
     * @throws \Exception
     */
    public function apiService($format, $id, $method)
    {
        if (!is_callable($method, $format)) {
            throw new \Exception("method invalid");
        }
        $factory = new FormatFactory();
        $adapterInstance = $factory->getFormatInstance($format);
        return $adapterInstance->$method($id);
    }

}