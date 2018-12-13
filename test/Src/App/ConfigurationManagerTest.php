<?php
namespace Test\App;

use PHPUnit\Framework\TestCase;

class ConfigurationManagerTest extends TestCase
{
    private $service;

    protected function setUp()
    {
        $this->service = new \Oat\App\ConfigurationManager(__dir__ . '/../sample/dummy.ini');
    }

    protected function tearDown()
    {
        unset($this->service);
    }

    public function testGet()
    {
        $this->assertEquals('value', $this->service->get('key1'));
    }

    public function testGetMultiValues()
    {
        $this->assertEquals(['value1', 'value2', 'value3'], $this->service->get('key2'));
    }

    /**
     * @expectedException Exception
     */
    public function testGetUnknownKey()
    {
        $this->service->get('');
    }
}