<?php

namespace interface;

interface ParentClass1
{
    public function name();
}

interface ParentClass2
{
    public function name($name, $age);
}

class ChildClass implements ParentClass2, ParentClass1
{
    public function name($name, $age)
    {
        echo "This is Parent1 Class<br>";
    }
}
