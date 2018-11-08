<?php
namespace Aot\Model\Factory;

class FormatFactory
{
    private $format = ['csv','json'];
    private $path = 'Aot\Model\Adapter\\';

    public function getFormatInstance($format)
    {
        if (in_array($format, $this->format)) {
            $classPath = $this->path . ucfirst($format);
            return new $classPath();
        }
        throw new \Exception("format invalid");
    }
}