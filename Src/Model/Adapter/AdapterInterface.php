<?php
namespace Aot\Model\Adapter;

interface AdapterInterface
{
    /**
     * @param $id
     * @return array
     */
    public function showOne($id);

    /**
     * @return array
     */
    public function showAll();

    /**
     * @return array
     */
    public function contentExtract();
}