<?php
namespace Aot\Model\Factory;

class FormatFactory
{
    private $format = ['csv','json'];
    private $path = 'Aot\Model\Adapter\\';

    /**
     * create an instance of adapter
     * @param $format
     * @return instance
     * @throws \Exception
     */
    public function getFormatInstance($format)
    {
        if (in_array($format, $this->format)) {
            $classPath = $this->path . ucfirst($format);
            $instanceAdapter = new $classPath();
            return $instanceAdapter;
        } else {
            throw new \Exception("format invalid");
        }
//        if (is_a($instanceAdapter, 'Csv')) {
//            return $instanceAdapter;
//        } else {
//            var_dump($instanceAdapter);
//            throw new \Exception("instance invalid");
//        }
    }
}