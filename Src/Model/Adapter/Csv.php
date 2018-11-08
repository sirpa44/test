<?php
namespace Aot\Model\Adapter;


class Csv
{
    private $path = ROOT . 'Source/testtakers.csv';

    /**
     * get all users
     * @return array
     */
    public function showAll()
    {
        return $this->contentExtract();
    }

    /**
     * get one user with the id
     * @param  array $id
     * @return array $content
     * @throws \Exception
     */
    public function showOne($id)
    {
        $content = $this->contentExtract();
        if (isset($content[$id])) {
            return $content[$id];
        } else {
            throw new \Exception("not found");
        }

    }

    /**
     * read, extract and convert a csv file content
     * @return array $datas
     */
    protected function contentExtract()
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
