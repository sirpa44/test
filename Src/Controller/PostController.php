<?php
namespace Aot\Controller;

use Aot\Model\Json;
use Aot\Model\Csv;

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
     * @param $setting
     * @return array
     * @throws \Exception
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
