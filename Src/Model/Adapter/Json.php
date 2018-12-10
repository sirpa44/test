<?php
namespace Oat\Model\Adapter;

use Oat\App\ConfigurationManager;
use Oat\App\Exception\AdapterException;

class Json extends Adapter
{
    protected $path;

    public function __construct($independencyContainer)
    {
        $this->path = __DIR__ . $independencyContainer->get(ConfigurationManager::class)->get('jsonsourcepath');
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
