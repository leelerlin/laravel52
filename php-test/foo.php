<?php

namespace Test\Reflection;

class Baz{}

class Bar{}

class Foo
{
    protected $baz;
    public function __construct(Baz $baz2)
    {
        $this->baz = $baz2;
    }
}