<?php
class Person
{
    public $name, $age;
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        echo "Name: " . $this->name . " " . $this->age . "<br>";
    }
}
