<?php
namespace Oat\App;

use Oat\App\Exception\ConfigException;

class ConfigurationManager implements ConfigurationInterface
{
    protected $configData;

    /**
     * ConfigurationManager constructor.
     * @param $configFilePath
     * @throws ConfigException
     */
    public function __construct($configFilePath)
    {
        if (!is_readable($configFilePath)) {
            throw new ConfigException('configuration file missing');
        }
        $this->configData = parse_ini_file($configFilePath, true);
//        echo '<pre>';
//        var_dump($this->configData);
//        echo '</pre>';
    }

    /**
     * get data from configuration file with the key in argument
     * @param $argument
     * @return array
     * @throws ConfigException
     */
    public function get($argument)
    {
        if (!isset($this->configData[$argument])) {
//            echo '<pre>';
//            var_dump($argument);
//            var_dump(array_keys($this->configData));
//            echo '</pre>';
            throw new ConfigException('wrong key or value missing');
        }
        if (is_string($this->configData[$argument]) && strpos($this->configData[$argument], ',')) {
            return preg_split("/,/", $this->configData[$argument]);
        }
        return $this->configData[$argument];
    }
}