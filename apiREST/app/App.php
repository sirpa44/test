<?php
namespace App;

class App
{
    $httpParam;
    $config;

    /**
     * App constructor.
     */
    public function __construct($httpParam = null, $config = null)
    {
        $this->httpParam    = $httpParam;
        $this->config       = $config;
    }

    public function wichFormat()
    {

    }


}
