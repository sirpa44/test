<?php
namespace core\controller;

use model\Json;
use model\Csv;

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
     * Display a listing of the ressource
     * GET /posts
     *
     * @param array $datas
     * @return Response
     */
    public function index($setting)
    {
        if ($setting['format']=='json') {
            return $this->json_instance->getAll();
        } elseif ($setting['format']=='csv') {
            return $this->csv_instance->getAll();
        }
    }

    /**
     * show the form for creating a new ressource
     * GET /posts/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }



    /**
     * Display a specified ressource
     * GET /posts/{id}
     *
     * @param int $id
     * @return Response
     */
    public function show($setting)
    {
        if ($setting['format']=='json') {
            return $this->json_instance->getone($setting);
        } elseif ($setting['format']=='csv') {
            return $this->csv_instance->getone($setting);
        }
    }

    /**
     * Show the form to editing the specified ressource
     * GET /posts/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }



    /**
     * Remove the specified ressource from storage
     * DELETE /posts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function delete($id)
    {
        //
    }
}
