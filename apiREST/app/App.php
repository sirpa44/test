<?php
namespace App;

class App
{

    public static function load()
    {
        session_start();
        require ROOT . '/apiREST/app/Autoloader.php';
        Autoloader::register();
        var_dump('coucou');die();
    }
}
