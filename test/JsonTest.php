<?php

use Oat\Model\Adapter\Json;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    public function testShowOne()
    {
        define('ROOT', __DIR__ . '/../Src/');
        $json = new Json();
        $user =  $json->showOne(10);
        $this->assertTrue(is_array($user));
    }
}