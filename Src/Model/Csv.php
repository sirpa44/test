<?php
namespace Aot\Model;


class Csv
{
    private $path;

    public function __construct(){
        $this->path = ROOT . 'Source/testtakers.csv';
    }

    /**
     * define the method
     * @param $method
     * @param null $id
     * @return array
     * @throws \Exception
     */
    public function csvMethod($method, $id = null)
    {
        if ($method == 'show' && $id) {
            return $this->getOne($id);
        } elseif ($method == 'show' && $id == null) {
            return $this->getAll();
        }
    }

    /**
     * get all users
     * @return array
     */
    private function getAll()
    {
        return $this->contentExtract();
    }

    /**
     * get one user with the id
     * @param  array $id
     * @return array $content
     * @throws \Exception
     */
    private function getOne($id)
    {
        $content = $this->contentExtract();
        if (array_key_exists($id, $content)) {
            return $content[$id];
        } else {
            throw new \Exception("not found");
        }

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
