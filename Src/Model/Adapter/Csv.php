<?php
namespace Oat\Model\Adapter;

use Oat\App\ConfigurationManager;
use Oat\App\Exception\AdapterException;

class Csv extends Adapter
{
    protected $path;

    public function __construct($independencyContainer)
    {
        $this->path = __DIR__ . $independencyContainer->get(ConfigurationManager::class)->get('csvsourcepath');
    }

    /**
     * read, extract and convert a csv file content
     * @return array $data
     * @throws AdapterException
     */
    protected function dataManager()
    {
        if (!file_exists($this->path)) {
            throw new AdapterException('csv file missing');
        }
        $resource = fopen($this->path, 'r');
        $headers = fgetcsv($resource);
        while (($line = fgetcsv($resource)) !== false) {
            $data[] = array_combine($headers, $line);
        }
        fclose($resource);
        return $data;
    }

}
