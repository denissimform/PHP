<?php

namespace abstract;

abstract class ParentClass
{
    public $name = "Denis";
    public abstract function getName(): mixed;
    public function getFullName()
    {
        print_r($this);
    }

    public function __construct()
    {
        echo "Call parent class construct<br>";
        echo $this::class;
    }
}

abstract class ParentClass1 extends ParentClass
{
    public abstract function getName(): string;
}

class ChildClass extends ParentClass1
{
    public $surname = "Shingala";
    public function getName(): string
    {
        return "This is child mehtod<br>";
    }

    public function getFullName()
    {
        echo "This is child public method<br>";
        // print_r($this);
    }
}

$obj = new ChildClass();

echo $obj->getName();
$obj->getFullName();
