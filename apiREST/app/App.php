<?php
namespace App;

class App
{

    /**
     *
     */
    public static function load()
    {
        require ROOT . '/app/Autoloader.php';
        Autoloader::register();
    }

    
}
