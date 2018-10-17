<?php
namespace Aot\Model;


class Json
{
    private $path;

    public function __construct(){
        $this->path = ROOT . 'Source/testtakers.json';
    }

    /**
     * define the method
     * @param $method
     * @param null $id
     * @return array|mixed
     * @throws \Exception
     */
    public function jsonMethod($method, $id = null)
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
        $data = $this->contentExtract();
        if (array_key_exists($id, $data)) {
            return $data[$id];
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
