<?php

/**
 * 
 * OPPS CONCEPTS : Object Oriented Programming 
 * Procedural Programming : writing code in step wise procedure to development applications.
 * OOPS : use of self-contained code (class & objects) to develop applications. ex : creating a registration/login module for one application which can be used for other applications also.
 * OOPS is faster & easier to execute.
 * Provides clear structure.
 * keeps code clean "DRY" don't repeat yourself.
 * helps making reuseable applications with less code and shorter development time.
 * 
 */


/**
 * Class & Object are two building blocks of OOPS.
 * Class : a template or blueprint for creating an object.
 * Object : inherits all the properties, method and behaviour from the class.
 * each object will have different values for propeties and different output.
 * Declaring a class with properties & methods.
 * 
 * Instaneof : used to check if an object belongs to a specific class
 */
class Calculation // Defining the class 
{
    public $a, $b, $c; // public properties can be accessed outside of class

    public function __construct()
    {
        echo "CONSTRUCTOR FROM PARENT <br>";
    }

    function sum()
    {
        $this->c = $this->a + $this->b; // $this -> keyword use to refer the current object and is only available inside the current method
        return $this->c;
    }
    function sub()
    {
        $this->c = $this->a - $this->b;
        return $this->c;
    }
}

class SetGet
{
    public $name;
    public $color;

    public function set_name($n, $c)
    {
        $this->name = $n;
        $this->color = $c;
    }
    public function get_name()
    {
        return "Fruit : " . $this->name . " / Color : " . $this->color . " ";
    }
}


/**
 * Creating objects of class / We can create multiple objects from same class with different or same input and outputs
 */
$objcOne = new Calculation();
$objcTwo = new Calculation();

$objSetGet = new SetGet();
$objSetGet->set_name("Apple", "Red");
print("<br>" . $objSetGet->get_name() . "<br>");

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
 * CONSTRUCTOR FUNCTION : [public function __construct() ] Automatically called when object of class is created. used to initialize the properties.
 * 
 * DESTRUCT FUCTION : [__destruct] -> automatically call  this function at the end of the script.
 */

/**
 * Access Modifier : Controls where a property or method can be accessed.
 * Public : Access from anywhere / default.
 * Protected : access inside the class and derived class.
 * Private : access only inside the class.
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
 * Overriding inheritance method : Inherited methods can be overridden by redefining the methods (use the same name) in the child class. 
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
    // function is declared here but it will be implemented in derived class and then it will be executed via derived class.

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
        echo "<br>Full name is " . self::$name; // $this canot be used / used self instead // self:: will the value from that class only in which 'self' is declrared
    }
}

ClassFive::fullName();


class classSix extends ClassFive
{
    public function show()
    {
        echo "<br>Derived class :" . parent::$name; // use value from its parent class
    }
}


$objClassSix = new classSix();


$objClassSix->show();


/**
 * Late Static bind :  
 */


class Abc
{
    protected static $name = "Tarun";
    public function showName()
    {
        echo "<br>Name is  : " . self::$name; // 'self' will show value from class where it is defined.
        echo "<br>Name is  : " . static::$name; // late binding will be applied to 'static' method. 'static' will show value from class where it is derived
    }
}
class Xyz extends Abc
{
    protected static $name = "Hope";
}

$abcObj = new Xyz();
$abcObj->showName();


/**
 * TRAITS : Used to declare methods that can be used in multiple clasees , along side the extended classes.
 */

trait Message // Creating a trait
{
    public function sayHello()
    {
        echo "<br>HELLO FROM TRAIT<br>";
    }
}

trait SecondMessage
{
    public function sayBye()
    {
        echo "<br>BYEEEEE<br>";
    }
    public function howAreYou()
    {
        echo "<br>How are you <br>";
    }
}

class SaySomething
{
    use Message; // implementing a trait 
}

class SayHi
{
    use Message, SecondMessage;
}
$objSaySomething = new SaySomething();
$objSayHi = new SayHi();

$objSaySomething->sayHello(); // calling a function from trait
$objSayHi->sayHello();
$objSayHi->sayBye();
$objSayHi->howAreYou();


/**
 * Trait method override : 
 */

trait TraitsOne
{
    public function one()
    {
        echo "<br>HELLO FROM TRAIT<br>"; // if same function is not defined in the final derived class for which object is created then this function will run.
    }
}

class ClassSeven
{
    public function one()
    {
        echo "<br>HELLO FROM CLASSS SIX</br>"; // lowest priority
    }
}
class ClassEight extends ClassSeven
{
    use TraitsOne;
    public function one()
    {
        echo "<br>HELLO FROM CLASS EIGHT</br>"; // heighest proprity / function from the derive class whcih uses the trait will have the heighset proprity.
    }
}


$objClassEight = new ClassEight();
$objClassEight->one();


/**
 * TYPE HINTING  :  Type hinting is a concept that provides hints to function for the expected data type of arguments. 
 *                  For example, If we want to add an integer while writing the add function, we had mentioned the 
 *                  data type (integer in this case) of the parameter.
 */


class ClassNine
{
    public function add(int $a, int $b): int // declaring the input types and output types
    {
        return $a + $b;
    }
}

$objClassNine = new ClassNine();

echo ("<br>" . $objClassNine->add(23, 345) . "<br>");


/**
 * We cannot include multiple classes with same name in one file. 
 * NAMESPACE : 
 */


include('First.php');
include('Second.php');

use First\test as abcd;

$objFirst = new abcd();
$objSecond = new Second\Test();
