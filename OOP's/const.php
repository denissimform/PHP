<?php

namespace const;

class MyClass
{
    const NAME = "Denis";

    function __construct()
    {
        echo self::NAME;
    }

    function getName()
    {
        echo self::NAME;
    }
}


$obj  = new MyClass;
$obj->getname();
echo MyClass::NAME;
