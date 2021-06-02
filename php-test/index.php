<?php

namespace App;

require "foo.php";

class App
{

    public function build($class)
    {
        $reflect = new \ReflectionClass($class);

        if(!$reflect->isInstantiable()) {
            throw new \Exception("cann't be instantiated!");
        }

        $constructor = $reflect->getConstructor();
        if(is_null($constructor)) {
            return new $class;
        }

        $params = $constructor->getParameters();
        $dependencies = $this->getDependencies($params);

        return $reflect->newInstanceArgs($dependencies);
    }

    public function getDependencies($params)
    {
        $dependencies = [];
        foreach($params as $param) {
            $dependency = $param->getClass();
            if(is_null($dependency)) {
                // 处理非class类型的依赖
                $dependencies[] = $this->resolveNonClass($param);
            }else {
                // 处理class类型的依赖
                $dependencies[] = $this->build($dependency->name);
            }

        }

        return $dependencies;
    }

    public function resolveNonClass($param)
    {
        if($param->isDefaultValueAvailable()){
            return $param->getDefaultValue();
        }

        throw new \Exception('no default value');
    }
}

$app = new App();
$class = "Test\Reflection\Foo";
$obj = $app->build($class);

var_dump($obj);