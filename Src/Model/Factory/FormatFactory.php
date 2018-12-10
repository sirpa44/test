<?php
namespace Oat\Model\Factory;

use Oat\App\ConfigurationManager;


class FormatFactory
{
    private $format;
    private $adapterPath;
    private $adapterInterfacePath;
    private $dependencyContainer;

    public function __construct($dependencyContainer)
    {
        $this->format = $dependencyContainer->get(ConfigurationManager::class)->get('available', true);
        $this->adapterPath = $dependencyContainer->get(ConfigurationManager::class)->get('adapterpath');
        $this->adapterInterfacePath = $dependencyContainer->get(ConfigurationManager::class)->get('adapterinterfacepath');
        $this->dependencyContainer = $dependencyContainer;
    }

    /**
     * create an instance of adapter
     * @param $format
     * @return instance
     * @throws \Exception
     */
    public function getFormatInstance($format)
    {
        $format = strtolower($format);
        if (!in_array($format, $this->format)) {
            throw new \Exception("format invalid");
        }
        $className = ucfirst($format);
        $classPath = $this->adapterPath . $className;
        if (!is_a($classPath, $this->adapterInterfacePath, true)) {
            throw new \Exception("instance invalid");
        }
        return $this->dependencyContainer->get($classPath);
    }
}