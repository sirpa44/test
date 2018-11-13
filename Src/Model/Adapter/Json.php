<?php
namespace Aot\Model\Adapter;


class Json extends Adapter
{
    protected $path = ROOT . 'Source/testtakers.json';

    /**
     * extract and convert a csv file content
     * @return array
     */
    protected function dataManager()
    {
        $content = file_get_contents($this->path);
        return json_decode($content, true);
    }
}
