<?php

use PHPUnit\Framework\TestCase;

class DependencyContainerTest extends TestCase
{
    private $service;

    protected function setUp()
    {
        $this->service = new \Oat\App\DependencyContainer();
    }

    protected function tearDown()
    {
        unset($this->service);
    }


    public function testSet()
    {
        $argument = function ($var) {
            return 'fixture';
        };
        $this->service->set('toto', $argument);
        $this->assertEquals('fixture', $this->service->get('toto'));
    }

    /**
     * @expectedException Exception
     */
    public function testGetUnknown()
    {
        $this->service->get('toto');
    }

    /**
     * @expectedException Exception
     */
    public function testSetNotCallable()
    {
        $this->service->set('unknownClass');
    }

}