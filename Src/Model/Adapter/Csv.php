<?php
namespace Aot\Model\Adapter;


class Csv
{
    private $path = ROOT . 'Source/testtakers.csv';

    /**
     * define the method
     * @param null $id
     * @return array
     * @throws \Exception
     */
    public function csvMethod($id)
    {
        if (isset($id)) {
            return $this->getOne($id);
        } elseif ($id == null) {
            return $this->getAll();
        }
    }

    /**
     * get all users
     * @return array
     */
    protected function getAll()
    {
        return $this->contentExtract();
    }

    /**
     * get one user with the id
     * @param  array $id
     * @return array $content
     * @throws \Exception
     */
    protected function getOne($id)
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
