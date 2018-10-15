<?php
namespace Aot\Model;


class Json
{
    private $path;

    public function __construct(){
        $this->path = ROOT . '/Source/testtakers.json';
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
     * get one user
     * @param  array $setting
     * @return array
     */
    public function getOne($setting)
    {
        $datas = $this->contentExtract();
        if (array_key_exists($setting['id'], $datas)) {
            return $datas[$setting['id']];
        } else {
            throw new \Exception("not found");
        }
    }

    /**
     * extract and convert a csv file content
     * @return array
     */
    private function contentExtract()
    {
        $content = file_get_contents($this->path);
        return json_decode($content, true);
    }
}
