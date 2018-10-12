<?php
namespace Aot\Controller;

class PostController
{
    private $format;
    private $method;

    public function __construct ()
    {
        $this->format = ['csv','json'];
        $this->method = ['show'];
    }

    public function checkSettings ($settings)
    {
        if (array_key_exists('format', $settings) && array_key_exists('method', $settings)) {
            $this->formatExist($settings['format']);
            $this->methodExist($settings['method']);
            die('coucou');
            // incomplete !!

        } else {
            throw new \Exception("settings invalid");
        }
    }

    private function formatExist ($format)
    {
        if (!in_array($format, $this->format))
        {
            throw new \Exception("format invalid");
        }
    }

    private function methodExist ($method)
    {
        if (!in_array($method, $this->method))
        {
            throw new \Exception("method invalid");
        }
    }
}
