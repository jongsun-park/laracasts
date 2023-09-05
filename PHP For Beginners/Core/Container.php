<?php

namespace Core;

class Container
{
    protected $bindings = [];

    // add
    // 컨테이너에 집어 넣는 것
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    // remove
    // 컨테이너에서 가져오는 것
    public function resolve($key)
    {
        // exception
        // guarding beginnings
        if(!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key} ");
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);

    }
}
