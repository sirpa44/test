<?php
namespace Oat\Model\Factory;

use Oat\App\ConfigurationManager;

class FormatFactory
{
    private $format;
    private $adapterPath;
    private $adapterInterfacePath;

    public function __construct($configurationManager)
    {
        $this->format = $configurationManager->get('available', true);
        $this->adapterPath = $configurationManager->get('adapterpath');
        $this->adapterInterfacePath = $configurationManager->get('adapterinterfacepath');
    }

    /**
     * create an instance of adapter
     * @param $format
     * @return instance
     * @throws \Exception
     */
    public function getFormatInstance($dic, $format)
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
        return $dic->get($className);
    }
}