<?php
namespace Aot\Model\Adapter;

abstract class Adapter
{
    /**
     * path to the ressources file
     * @var string
     */
    protected $path;

    /**
     * get one user with the ID
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function showOne($id)
    {
        $content = $this->contentExtract();
        if (!isset($content[$id])) {
            throw new \Exception("not found");
        }
        return $content[$id];
    }

    /**
     * get all the user
     * @return array
     */
    public function showAll()
    {
        return $this->contentExtract();
    }

    /**
     * read, extract and convert a csv file content in array
     * @return array
     */
    abstract protected function contentExtract();
}