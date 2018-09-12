<?php
namespace App;

class App
{

    /**
     * autoloading 
     */
    public static function load()
    {
        require ROOT . '/app/Autoloader.php';
        Autoloader::register();
    }


}
