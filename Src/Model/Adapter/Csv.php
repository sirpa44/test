<?php
namespace Oat\Model\Adapter;


class Csv extends Adapter
{
    protected $path = ROOT . 'Source/testtakers.csv';

    /**
     * read, extract and convert a csv file content
     * @return array
     */
    protected function dataManager()
    {
        $ressource = fopen($this->path, 'r');
        $headers = fgetcsv($ressource);
        while (($line = fgetcsv($ressource)) !== false) {
            $datas[] = array_combine($headers, $line);
        }
        fclose($ressource);
        return $datas;
    }

}
