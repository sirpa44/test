<?php
namespace Test\App;

use Oat\App\ConfigurationManager;
use Oat\App\DependencyContainer;
use Oat\Controller\ApiController;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private $service;

    protected function setUp()
    {

//            ->willReturn($configurationManager);
//
//        $dependencyContainer
//            ->method('get')
//            ->with('Oat\Controller\ApiController')
//            ->willReturn($apiController);


    }

    protected function tearDown()
    {
        unset($this->service);
    }

    public function testRoute()
    {
        $parameters = ['controller' => 'api', 'method' => 'show'];
        $configurationManager = $this->createMock(ConfigurationManager::class);
        $configurationManager
            ->method('get')
            ->willReturn("\Oat\Controller\ControllerInterface");

        $apiController = $this->createMock(ApiController::class);
        $apiController
            ->method('action')
            ->willReturn('isGood');


        $dependencyContainer = $this->createMock(DependencyContainer::class);
        $dependencyContainer
            ->method('get')
            ->willReturnOnConsecutiveCalls(
                $apiController,
                $configurationManager
            );

        $service = new \Oat\App\Router($dependencyContainer);

        $this->assertEquals('isGood', $service->route($parameters));
    }

    /**
     * @expectedException \Exception
     */
    public function testRouteWithWrongParametersController()
    {
        $parameters = ['controller' => null, 'method' => 'show'];

        $service = new \Oat\App\Router('coucou');

        $service->route($parameters);
    }

    /**
     * @expectedException \Exception
     */
    public function testRouteWithWrongParametersMethod()
    {
        $parameters = ['controller' => 'api', 'method' => null];

        $service = new \Oat\App\Router('coucou');

        $service->route($parameters);
    }

    /**
     * @expectedException \Exception
     */
    public function testControllerWithoutInterface()
    {
        $parameters = ['controller' => 'api', 'method' => 'show'];

        $configurationManager = $this->createMock(ConfigurationManager::class);
        $configurationManager
            ->method('get')
            ->willReturn(null);

        $apiController = $this->createMock(ApiController::class);
        $apiController
            ->method('action')
            ->willReturn('isGood');

        $dependencyContainer = $this->createMock(DependencyContainer::class);
        $dependencyContainer
            ->method('get')
            ->willReturnOnConsecutiveCalls(
                $apiController,
                $configurationManager
            );

        $this->service = new \Oat\App\Router($dependencyContainer);

        $this->service->route($parameters);
    }


//    public function testOther()
//    {
//        $stub = $this->createMock(ConfigurationManager::class);
//        $stub->method('get')
//            ->willReturn('interface');
//
//        $dic = new DependencyContainer();
//        $dic->set(ConfigurationManager::class, $stub);
//
//
//        $this->service = new \Oat\App\Router($dic);
//    }
}
