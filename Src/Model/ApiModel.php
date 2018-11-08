<?php
namespace Aot\Model;

use Aot\Model\Factory\FormatFactory;

class ApiModel
{


    /**
     * call the factory and call the adapter
     * @param $format
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function apiService($format, $id, $method)
    {
        if (is_callable($method, $format)) {
            $factory = new FormatFactory();
            $adapterInstance = $factory->getFormatInstance($format);
            return $adapterInstance->$method($id);
        } else {
            throw new \Exception("method invalid");
        }
    }

}