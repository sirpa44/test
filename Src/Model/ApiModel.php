<?php
namespace Aot\Model;

class ApiModel
{
    private $format = [];

    public function __construct()
    {
        $this->format = ['csv','json'];
    }

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
        return $this->choseFormat($format, $id);
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
    private function choseFormat($format, $id)
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