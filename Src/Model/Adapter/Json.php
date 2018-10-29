<?php
namespace Aot\Model\Adapter;


class Json
{
    private $path = ROOT . 'Source/testtakers.json';

    /**
     * define the method
     * @param null $id
     * @return array|mixed
     * @throws \Exception
     */
    public function jsonMethod($id)
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
     * get one with the id
     * @param $id
     * @return mixed
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
     * extract and convert a csv file content
     * @return array
     */
    protected function contentExtract()
    {
        $content = file_get_contents($this->path);
        return json_decode($content, true);
    }
}