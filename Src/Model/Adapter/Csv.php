<?php
namespace Oat\Model\Adapter;

use Oat\App\Exception\AdapterException;

class Csv extends Adapter
{
    protected $path = ROOT . 'Source/testtakers.csv';

    /**
     * read, extract and convert a csv file content
     * @return array
     * @throws AdapterException
     */
    protected function dataManager()
    {
        if (!file_exists($this->path)) {
            throw new AdapterException('csv file missing');
        }
        $ressource = fopen($this->path, 'r');
        $headers = fgetcsv($ressource);
        while (($line = fgetcsv($ressource)) !== false) {
            $datas[] = array_combine($headers, $line);
        }
        fclose($ressource);
        return $datas;
    }

}
