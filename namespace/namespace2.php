<?php

namespace my_namespace2;

class dummy
{
    public static $name = "Yash";

    function getName()
    {
        echo self::$name;
    }
}

// echo dummy1::$name;