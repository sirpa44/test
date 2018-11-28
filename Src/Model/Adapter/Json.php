<?php
namespace Oat\Model\Adapter;


use Oat\App\Exception\AdapterException;
use Oat\App\Exception\ConfigException;

class Json extends Adapter
{
    protected $path = ROOT . 'Source/testtakers.json';

    /**
     * extract and convert a csv file content
     * @return array
     * @throws ConfigException
     */
    protected function dataManager()
    {
        if (!file_exists($this->path)) {
            throw new AdapterException('json file missing');
        }
        $content = file_get_contents($this->path);
        return json_decode($content, true);
    }
}
