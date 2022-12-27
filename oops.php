<?php

/**
 * OPPS CONCEPTS
 */


/**
 * Declaring a class with properties & methods.
 */
class Calculation
{
    public $a, $b, $c; // public properties can be accessed outside of class

    public function __construct()
    {
        echo "CONSTRUCTOR FROM PARENT <br>";
    }

    function sum()
    {
        $this->c = $this->a + $this->b;
        return $this->c;
    }
    function sub()
    {
        $this->c = $this->a - $this->b;
        return $this->c;
    }
}


/**
 * Creating objects of class
 */
$objcOne = new Calculation();
$objcTwo = new Calculation();

/**
 * Assiging the valuse to properties and calling the methods or function
 */
$objcOne->a = 23; // Assiging values
$objcOne->b = 32;
print($objcOne->sum() . "<br>"); //calling method
print($objcOne->sub() . "<br>");

$objcTwo->a = 2345;
$objcTwo->b = 32234;
print($objcTwo->sum() . "<br>");
print($objcTwo->sub() . "<br>");

/**
 * CONSTRUCTOR FUNCTION : a function which is called automatically when an object is created of a class
 */

class One
{
    private $a, $b, $c, $name;
    public function __construct($one, $two, $n = "Tarun") // default value for $n variable
    {
        $this->a = $one;
        $this->b = $two;
        $this->name = $n;
    }
    public function sum()
    {
        $this->c = $this->a + $this->b;
        echo "Sum is " . $this->c . "<br>";
        echo "Name is : " . $this->name . "<br>";
    }
}

$objoneOne = new One(34, 3423, "Priya Chauhan"); // passsing value when object is created;

$objoneTwo = new One(324, 123); // no value is passed for $n varibale , default value will be used.

$objoneOne->sum();
$objoneTwo->sum();


/**
 * Inheritance : Method for inherit all the public and protected properties and methods from parent class and in addition it can have its own properties.
 */

class CalculationChild extends Calculation
{
    public $x, $y, $z;
    public function __construct($xx, $yy, $zz)
    {
        $this->x = $xx;
        $this->y = $yy;
        $this->z = $zz;
    }
    public function product()
    {
        echo "Product is : " . $this->x * $this->y . "<br>";
    }
    public function division()
    {
        echo "Division is :" . $this->x / $this->y . "<br>";
    }
}

$objCalculationChild = new CalculationChild(23, 124, 123);

$objCalculationChild->a = 2323123;
$objCalculationChild->b = 3423;
echo "Derived from base class :" . $objCalculationChild->sum() . "<br>";

$objCalculationChild->product();
$objCalculationChild->division();

/**
 * Access Modifiers : Controls where properties and methods can be accessed;
 * Public : can be accessed anywhere.
 * Protected : Can be accessed inside the class and class which is derived from that class.
 * Private : Can only be accessed inside the class
 */


/**
 * Overriding Methods & Properties : Both parent and child classes should have same function name with same number of arguments.
 *                                   It is used to replace parent method in child class.
 *                                   The purpose of overriding is to change the behavior of parent class method.
 *                                   The two methods with the same name and same parameter is called overriding.
 */


class BaseClass
{
    protected $name, $location;
    public function __construct($n, $l)
    {
        $this->name = $n;
        $this->location = $l;
    }

    public function show()
    {
        print("Hello " . $this->name . " from " . $this->location . "<br>");
    }
}

class DerivedClass extends BaseClass
{
    protected $name, $location;

    public function __construct($n, $l)
    {
        $this->name = $n . " Chauhan"; // PROPERTY OVERRIDING
        $this->location = $l;
    }
    public function show() // METHOD OVERRIDING
    {
        print("Drived Class : Hello " . $this->name . " from " . $this->location . "<br>");
    }
}
$objTwo = new BaseClass("Tarun", "Gumma");
$objThree = new DerivedClass("Hope", "Shimla");

$objTwo->show();
$objThree->show();


/**
 * ABSTRACT CLASS : Class which we don't want to be derived direclty . [incomplete class -> needs derived class to complete its methods]
 */
abstract class ClassOne
{
    protected $name;
    function __construct($n)
    {
        $this->name = $n;
    }
    abstract protected function show($location); // abstract method :  which is just declared but it doesn't perform any action / 
    // function in declraed here but it will be implemented in derived class.

}

class ClassTwo extends ClassOne
{
    public function show($location)
    {
        echo "Name is " . $this->name . " from " . $location . " <br>";
    }
}

$objClassTwo = new ClassTwo("Hope Chauhan");

$objClassTwo->show("Gumma");


/**
 * INTERFACE : Used to inherit multiple classes in a single class
 * Use 'interface' keyword instead of 'class'.
 * no propertoes can be defined in innterface.
 * Interface workds as abstract class.
 * No object can be created from interface
 */

interface interfaceOne
{
    function fnOne($name);
}
interface interfaceTwo
{
    function fnTwo($location);
}


class classFour implements interfaceOne, interfaceTwo
{
    function fnOne($name)
    {
        echo "HELLO " . $name . "<br>";
    }
    function fnTwo($location)
    {
        echo "LOCATION " . $location . "<br>";
    }
}


$objInheritance = new classFour();

$objInheritance->fnOne("Tarun");

$objInheritance->fnTwo("Gumma");


/**
 * Static Methods : methods can be called without creating the object of the class
 * If all properties & methods in a class in static then the class is automatically a static class
 */

class ClassFive
{
    public static $name = "Tarun Chauhan";

    public static function fullName()
    {
        echo "<br>Full name is " . self::$name; // $this canot be used / used self instead
    }
}

ClassFive::fullName();


class classSix extends ClassFive
{
    public function show()
    {
        echo "<br>Derived class :" . parent::$name;
    }
}


$objClassSix = new classSix();


$objClassSix->show();
