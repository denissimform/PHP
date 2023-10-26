<?php

class MyClass
{
    public $name = "Denis";
    static private $surname = "Shingala";

    public function __construct()
    {
        echo "Call myclass";
    }

    public function fn1()
    {
        echo "Name: " . $this->name . " " . self::$surname;
    }
}

$obj = new MyClass;
$obj->fn1();
