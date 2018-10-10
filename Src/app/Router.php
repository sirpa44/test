<?php
namespace Aot\App;

use Aot\controller\PostController;

class Router
{
    private $pc_instance;


    public function __construct()
    {
        $this->pc_instance = new PostController();
    }

    /**
     * select the method
     * @param  array $datas
     * @return array
     */
    public function method($datas = [])
    {
        if ($datas['method'] == 'show' && !array_key_exists('id', $datas)){
            return $this->pc_instance->index($datas);
        } elseif ($datas['method'] == 'show') {
            return $this->pc_instance->show($datas);
        } else {
            throw new \Exception("not found");
        }
    }
}
