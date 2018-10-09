<?php
namespace Aot\core\controller;

use Aot\model\Json;
use Aot\model\Csv;

class PostController
{
    private $json_instance;
    private $csv_instance;

    public function __construct()
    {
        $this->json_instance    = new Json();
        $this->csv_instance     = new Csv();
    }

    /**
     * select the format
     * @param array $setting
     * @return array
     */
    public function index($setting)
    {
        if ($setting['format']=='json') {
            return $this->json_instance->getAll();
        } elseif ($setting['format']=='csv') {
            return $this->csv_instance->getAll();
        } else {
            throw new \Exception("not found");
        }
    }

    /**
     * select the format
     * @param array $setting
     * @return array
     */
    public function show($setting)
    {
        if ($setting['format']=='json') {
            return $this->json_instance->getone($setting);
        } elseif ($setting['format']=='csv') {
            return $this->csv_instance->getone($setting);
        } else {
            throw new \Exception("not found");
        }
    }

}
