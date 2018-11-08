<?php
namespace Aot\Model;

use Aot\Model\Adapter\Csv;
use Aot\Model\Adapter\Json;
use Aot\Model\Factory\FormatFactory;

class ApiModel
{

    /**
     * check $format and $method and lead to the function choseFormat
     * @param $format
     * @param null $id
     * @return array
     * @throws \Exception
     */
    public function apiService($format, $id)
    {
        $factory = new FormatFactory();
        $adapterInstance = $factory->getFormatInstance($format);
        $method = $format . 'Method';
        return $adapterInstance->$method($id);
    }
}