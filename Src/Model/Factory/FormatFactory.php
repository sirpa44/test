<?php
namespace Aot\Model\Factory;

class FormatFactory
{
    private $format = ['Csv','Json'];
    private $path = 'Aot\Model\Adapter\\';
    private $adapterInterfacePath = 'Aot\Model\Adapter\AdapterInterface';

    /**
     * create an instance of adapter
     * @param $format
     * @return instance 
     * @throws \Exception
     */
    public function getFormatInstance($format)
    {
        $className = ucfirst($format);
        if (!in_array($className, $this->format)) {
            throw new \Exception("format invalid");
        }
        $classPath = $this->path . $className;
        $instanceAdapter = new $classPath();
        if (!is_a($instanceAdapter, $this->adapterInterfacePath)) {
            throw new \Exception("instance invalid");
        }
        return $instanceAdapter;
    }
}