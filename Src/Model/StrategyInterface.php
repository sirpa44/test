<?php
namespace Aot\Model;

interface StrategyInterface
{

    public function ocotpus($format, $method, $id = null);

    private function checkFormat($format);

    private function checkMethod();
}