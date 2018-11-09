<?php
namespace Aot\Model\Adapter;

interface AdapterInterface
{
    /**
     * get one user with the ID
     * @param $id
     * @return array
     */
    public function showOne($id);

    /**
     * get all the user
     * @return array
     */
    public function showAll();

    /**
     * read, extract and convert a csv file content in array
     * @return array
     */
    public function contentExtract();
}