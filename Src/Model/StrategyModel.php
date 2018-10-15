<?php
namespace Aot\Model;

class StrategyModel
{
    private $format = [];
    private $method = [];

    public function __construct()
    {
        $this->format = ['csv','json'];
        $this->method = ['show'];
    }

    /**
     * check $format and $method and lead to the function choseFormat
     * @param $format
     * @param $method
     * @param null $id
     * @return array
     * @throws \Exception
     */
    public function apiService($format, $method, $id = null)
    {
        $this->checkFormat($format);
        $this->checkMethod($method);
        if ($id) {
            return $this->choseFormat($format, $method, $id);
        }
        return $this->choseFormat($format, $method);
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
     * check $method
     * @param $method
     * @throws \Exception
     */
    private function checkMethod($method)
    {
        if (!in_array($method, $this->method))
        {
            throw new \Exception("method invalid");
        }
    }

    /**
     * define the method and lead to the good class
     * @param $format
     * @param $method
     * @param null $id
     * @return array
     * @throws \Exception
     */
    private function choseFormat($format, $method, $id = null)
    {
        if ($format == 'json') {
            $json = new Json();
            if ($id) {
                return $json->jsonMethod($method, $id);
            }
            return $json->jsonMethod($method);
        } elseif ($format == 'csv') {
            $csv = new Csv();
            if ($id) {
                return $csv->csvMethod($method, $id);
            }
            return $csv->csvMethod($method);
        }
    }
}