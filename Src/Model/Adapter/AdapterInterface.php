<?php
namespace Oat\Model\Adapter;

interface AdapterInterface
{
    /**
     * get one user with the ID
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function showOne($id);

    /**
     * get all the user
     * @return array
     */
    public function showAll();
}