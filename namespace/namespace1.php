<?php

namespace my_namespace1;
class derive{

    public $id;
}
class dummy extends derive
{
    public static $name = "Denis";

    function getName()
    {
        echo self::$name;
    }
}

// echo dummy::$name;