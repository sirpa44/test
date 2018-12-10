<?php
namespace Oat\Model;

use Exception;
use Oat\App\ConfigurationManager;
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
    public function apiService($dic, $format, $userId, $method)
    {
        if (!is_callable($method, $format)) {
            throw new Exception("method invalid");
        }
        $adapterInstance = $dic->get('FormatFactory')->getFormatInstance($dic, $format);
        return $adapterInstance->$method($userId);
    }

}