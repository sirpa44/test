<?php
namespace Aot\Model\Adapter;


class Json implements AdapterInterface
{
    private $path = ROOT . 'Source/testtakers.json';

    /**
     * get all users
     * @return array
     */
    public function showAll()
    {
        return $this->contentExtract();
    }

    /**
     * get one with the id
     * @param $id
     * @return array
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
     * extract and convert a csv file content
     * @return array
     */
    public function contentExtract()
    {
        $content = file_get_contents($this->path);
        return json_decode($content, true);
    }
}
