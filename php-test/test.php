<?php


class Foo {
    public function getName()
    {
        var_dump($this);
    }
}

class Baz extends Foo {

}

$baz = new Baz();
$baz->getName();