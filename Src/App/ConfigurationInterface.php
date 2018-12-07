<?php
namespace Oat\App;

interface ConfigurationInterface
{
    /**
     * get data from configuration file with the key in argument
     * @param $argument
     * @return array
     */
    public function get($argument);
}