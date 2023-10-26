<?php

namespace traits;

trait Denis
{
    public $name;
    public function __construct()
    {
        $this->name = "Denis";
        $this->age = 21;
    }

    protected abstract function getAge();
}

trait Yash
{
    public $age;
    public function __construct($name = "Yash", $age = 19)
    {
        $this->name = $name;
        $this->age = $age;
    }

    private abstract function getName();
}

class ChildClass
{
    use Denis, Yash {
        // Denis::__construct insteadof Yash;
        Yash::__construct insteadof Denis;
        // Yash::__construct as public __construct1;
    }

    // function __construct()
    // {
    //     echo "Child class<br>";
    // }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    function getDetails()
    {
        echo "Name is " . $this->name . " and age is " . $this->age . "<br>";
    }
}

$obj = new ChildClass();
$obj->getDetails();
echo $obj->getName() . "<br>";
echo $obj->getAge() . "<br>";
