<?php
namespace Oat\App;

use Exception;

class DependencyContainer implements DependencyContainerInterface
{
    private $registry = [];

    /**
     * find a closure with it class name
     * @param $className
     * @return mixed
     * @throws Exception
     */
    public function get($shortClassName)
    {
        if (!array_key_exists($shortClassName, $this->registry)) {
            throw new Exception('class ' . $shortClassName . '  isn\'t set');
        }
        return $this->registry[$shortClassName]($this);
    }

    /**
     * stock a closure of in $this->registry with $shortClassName as key
     * @param $className
     * @param null $closure
     * @throws Exception
     */
    public function set($className, $closure = null)
    {
        if (!is_callable($closure))
        {
            if (!class_exists($className)) {
                throw new Exception('class ' . $className . ' doesn\'t exist');
            }
            $closure = function () use ($className) {
                return new $className();
            };
        }
        $modifiedClassName = array_reverse(explode('\\',$className));
        $shortClassName = $modifiedClassName[0];
        $this->registry[$shortClassName] = $closure;
    }
}