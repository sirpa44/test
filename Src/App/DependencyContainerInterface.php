<?php
namespace Oat\App;

interface DependencyContainerInterface
{
    /**
     * find an intance with it class name
     * @param $className
     * @return mixed
     * @throws \Exception
     */
    public function get($className);

    /**
     * stock intances in $this->instances with $shortClassName as key
     * @param $className
     * @param $callable
     */
    public function set($className, $callable);
}
