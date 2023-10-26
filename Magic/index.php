<?php
$a = 123;
echo $a;
// __autoload (spl_autoload_register) use for import file automatically
spl_autoload_register(function ($class) {
    include("./include/" . $class . ".php");
});

class ChildClass extends Class1
{
    private $data = "Denis";
    public static $name = "Denis";
    public $class;

    function __construct(Class2 $class)
    {
        $this->class = $class;
    }

    function __get($property)
    {
        echo "This is private or not define property(" . $property . ")<br>";
    }

    function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            echo "$property property not exists!<br>";
        }
    }

    private function getData()
    {
        return $this->data;
    }

    function __call($method, $args)
    {
        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], $args);
        } else {
            return "Method not exists<br>";
        }
    }

    private static function getName()
    {
        return self::$name;
    }

    static public function __callStatic($method, $arguments)
    {
        if (method_exists(__CLASS__, $method)) {
            return call_user_func_array([__CLASS__, $method], $arguments);
        } else {
            return "Static method is not exists<br>";
        }
    }

    function __isset($property)
    {
        if (isset($this->$property)) {
            return true;
        } else {
            return false;
        }
    }

    function __unset($property)
    {
        unset($this->$property);
    }

    function __toString()
    {
        return "You can't print object of " . get_class($this) . " using echo function";
    }

    function __sleep()
    {
        return ["name0"];
    }

    function __wakeup()
    {
        $this->ame = "Yash";
    }

    function __clone()
    {
        $this->class = clone $this->class;
    }

    function __invoke()
    {
        echo "You are calling class instance!!";
    }
}

echo "<pre>";
$obj = new ChildClass(new Class2());
$obj->data11;

$obj->data = "Denis";
$obj->data11 = "Yash";
echo $obj->getData() . "<br>";
echo ChildClass::getName() . "<br>";
echo isset($obj->name0) . "<br>";
echo isset($obj->day) . "<br>";
unset($obj->data);
echo $obj->data;
echo $obj . "\n";
echo serialize($obj);
unserialize((serialize($obj)));


$obj1 = clone $obj;
echo $obj->class->name . "\n";
$obj->class->name = "Changed";
echo $obj->class->name . "\n";
echo $obj1->class->name . "\n";

$obj();
