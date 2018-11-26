<?php
namespace Oat\Model\Factory;

class FormatFactory
{
    private $format = ['Csv','Json', 'Database'];
    private $path = 'Oat\Model\Adapter\\';
    private $interfacePath = 'Oat\Model\Adapter\AdapterInterface';

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
        if (!is_a($classPath, $this->interfacePath, true)) {
            throw new \Exception("instance invalid");
        }
        return new $classPath();
    }
}