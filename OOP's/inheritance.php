<?php

namespace inheritance;

class ParentClass
{
    public $name, $surname;
    private $bank_name;
    protected $password;

    function __construct($name, $surname, $bank_name = 'State bank of india', $password = "Test@123")
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->bank_name = $bank_name;
        $this->password  = $password;
        echo "<br> Parent class constructer has been called<br><br>";
    }

    // classes method
    function getFullNameOfParent()
    {
        echo "<br><br>Name: $this->name $this->surname and his bank name is $this->bank_name and password is $this->password";
    }

    function onlyOnefunction($name, $age)
    {
        echo "This should be only one !!";
    }

    function __destruct()
    {
        echo "End parent" . PHP_EOL;
    }
}

class ChildClass extends ParentClass
{
    public $name, $bank_name;

    function __construct($name = 'Harshil', $bank_name = 'bank of baroda')
    {
        $this->name = $name;
        $this->bank_name = $bank_name;
        echo "<br> Child class constructer has been called<br>";
    }

    function getFullNameOfChild()
    {
        parent::__construct('Denis', 'Shingala');
        echo "Name: $this->name $this->surname <br> Password is $this->password <br> Bank name is $this->bank_name";
    }

    // throw an error beacuse in parent class 
    // function onlyOnefunction($name, $age)
    // {
    //     echo "This should be only one !!";
    // }

    function __destruct()
    {
        echo "End child" . PHP_EOL;
    }
}

$obj = new ChildClass;
$obj = new ChildClass('Yash');
$obj = new ChildClass("Denis", "Yash");
$obj->getFullNameOfChild();
$obj->getFullNameOfParent();
// $obj->onlyOnefunction("Denis");
