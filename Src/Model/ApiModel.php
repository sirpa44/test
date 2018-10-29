<?php
namespace Aot\Model;

use Aot\Model\Adapter\Csv;
use Aot\Model\Adapter\Json;

class ApiModel
{
    private $format = ['csv','json'];

    /**
     * check $format and $method and lead to the function choseFormat
     * @param $format
     * @param null $id
     * @return array
     * @throws \Exception
     */
    public function apiService($format, $id)
    {
        $this->checkFormat($format);
        return $this->chooseFormat($format, $id);
    }

    /**
     * check $format
     * @param $format
     * @throws \Exception
     */
    private function checkFormat($format)
    {
        if (!in_array($format, $this->format))
        {
            throw new \Exception("format invalid");
        }
    }

    /**
     * @param $format
     * @param $id
     * @return array|mixed
     * @throws \Exception
     */
    private function chooseFormat($format, $id)
    {
        if ($format == 'json') {
            $formatInstance = new Json();;
        } elseif ($format == 'csv') {
            $formatInstance = new Csv();
        }
        $method = $format . 'Method';
        return $formatInstance->$method($id);
    }
}