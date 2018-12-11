<?php
namespace Oat\Model\Adapter;

use Oat\App\ConfigurationManager;
use Oat\App\Exception\AdapterException;

class Json extends Adapter
{
    protected $path;

    public function __construct($dependencyContainer)
    {
        $config = $dependencyContainer->get(ConfigurationManager::class)->get('json');
        $this->path = $config['jsonsourcepath'];
    }

    /**
     * extract and convert a csv file content
     * @return array
     * @throws AdapterException
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
