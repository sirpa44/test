<?php
namespace Aot\Model;


class Csv
{
    private $path;

    public function __construct(){
        $this->path = ROOT . 'source/testtakers.csv';
    }

    /**
     * get all users
     * @return array
     */
    public function getAll()
    {
        return $this->contentExtract();
    }

    /**
     * get on user
     * @param  array $setting
     * @return array $datas
     */
    public function getOne($setting)
    {
        $datas = $this->contentExtract();
        if (array_key_exists($setting['id'], $datas)) {
            return $datas[$setting['id']];
        }
        throw new \Exception("not found");

    }

    /**
     * read, extract and convert a csv file content
     * @return array $datas
     */
    private function contentExtract()
    {
        $ressource = fopen($this->path, 'r');
        $headers = fgetcsv($ressource);
        while (($line = fgetcsv($ressource)) !== false) {
            $datas[]  = array_combine($headers, $line);
        }
        fclose($ressource);
        return $datas;
    }

}
