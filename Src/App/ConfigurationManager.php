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
        if (!file_exists($configFilePath)) {
            throw new ConfigException('configuration file missing');
        }
        $this->configData = parse_ini_file($configFilePath);
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
            throw new ConfigException('wrong key or value missing');
        }
        if (strpos($this->configData[$argument], ',')) {
            return preg_split("/,/", $this->configData[$argument]);
        }
        return $this->configData[$argument];
    }
}