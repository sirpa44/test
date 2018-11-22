<?php
namespace Oat\Model\Factory;

class FormatFactory
{
    private $format = ['Csv','Json'];
    private $path = 'Oat\Model\Adapter\\';
    private $abstractClassPath = 'Oat\Model\Adapter\Adapter';

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
        if (!is_a($classPath, $this->abstractClassPath, true)) {
            throw new \Exception("instance invalid");
        }
        return new $classPath();
    }
}