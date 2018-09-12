<?php
namespace app;

class Autoloader
{

    static public function register()
    {
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    static public function autoload($class)
    {
        $class = str_replace('\\', '/', $class);
        $fileName = ROOT . '/' . $class . '.php';
        if(file_exists($fileName))
        {
            require $fileName;
        } else {
            throw new \Exception("file not found");
        }
    }
}
