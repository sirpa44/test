<?php
namespace Test\Controller;

use Oat\App\DependencyContainer;
use Oat\Controller\ApiController;
use Oat\Model\ApiModel;
use PHPUnit\Framework\TestCase;

class ApiControllerTest extends TestCase
{
    public function testAction()
    {
        $parameters = ['format' => 'json'];
        $method = 'show';


        $apiModel = $this->createMock(ApiModel::class);
        $apiModel
            ->method('apiService')
            ->willReturn('isGood');

        $dependencyContainer = $this->createMock(DependencyContainer::class);
        $dependencyContainer
            ->method('get')
            ->willReturn($apiModel);

        $service = new ApiController($dependencyContainer);

        $this->assertEquals('isGood', $service->action($parameters, $method));

    }
}