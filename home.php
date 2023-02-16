<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Basics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>PHP Basics</h1>
        <?php

        $msg = "Hello!!! !<br>";
        echo $msg;

        /**
         * DATA TYPES IN PHP : 
         * String = "Hello";
         * Integer = 83 , -78
         * Float = -34.23, 12.59
         * Boolean = true/false
         * Array = array("ABC",32, 23.1231)
         * Object = new myClass()
         * Null = null.
         * **/

        $name = "Tarun Chauhan"; // String 
        $num = 123; // Integer
        $dec = 123.45; // Float
        $status = true; // Boolean
        $list = array("Tarun", "B.tech", "CSE", 2013); // Array
        $X = null; // NULL
        /**
         *  PHP FUNCTION TO KNOW THE DATA TYPE : var_dump() 
         * 
         */
        echo "<br><br>---------PHP VARIABLES, VARIABLES TYPE & CONSTANT----------<br><br>";
        var_dump($name);
        echo "<br>";
        var_dump($num);
        echo "<br>";
        var_dump($dec);
        echo "<br>";
        var_dump($status);
        echo "<br>";
        var_dump($list);
        echo "<br>";
        var_dump($X);

        /**
         * 
         * CONSTANT VARIABLE IN PHP :
         * A variable whose value can't be changed once declared.
         * All constant variables are global variables.
         * Case senstive by default.
         * Syntex : define(name,value,case-senstive[true/false])
         * 
         */

        define('author', 'Tarun Chauhan'); // constant
        define('_USER', 'root');
        define('_PASSWORD', 'password', false);

        echo "<br>" . author;


        /**
         * 
         * ARITHMATIC OPERATORS IN PHP : 
         *  + -> Addition
         *  - -> Subtraction
         *  * -> Multiplication
         *  ** -> Exponential
         *  / -> Division
         *  % -> Modulus(Reminder)
         *  ++ -> Increment Operator
         *  -- -> Decrement Operator
         * 
         */
        echo "<br><br>----------ARITHMATIC OPERATOR----------<br>";
        $a = 123;
        $b = 893;
        $c = 23.12;
        echo "<br> A = " . $a . " , B = " . $b . " and C = " . $c;
        $sum = $a + $b; // Addition
        $sub = $c - $b; // Subtraction
        $mul = $a * $c; // Multiplication
        $div = $a / $b; // Division
        $exp = $b ** 6; // Exponential
        $mod = $b % $a; // Modulus

        echo "<br> SUM(A+B) : " . $sum;
        echo "<br> SUB(C-B) : " . $sub;
        echo "<br> MUL(A*C) : " . $mul;
        echo "<br> DIV(A/B) : " . $div;
        echo "<br> EXPO(B**6) : " . $exp;
        echo "<br> MODULUS(B % A) : " . $mod;
        echo "<br> INCREMENT(A++) : " . $a++;
        echo "<br> DECREMENT(--B) : " . --$b;

        /**
         *  
         *  ASSIGNMENT OPERATORS : Arithmatic operators used with =.
         *  =  ->  X = Y ->  Y = X
         *  += ->  X += Y  -> X = X + Y 
         *  -= -> X -= Y -> X = X - Y
         *  *= -> X *= Y -> X = X * Y
         *  /= -> X /= Y -> X = X / Y
         *  %= -> X %= Y -> X = X % Y
         *  **= -> X **= Y -> X = X ** Y
         *  .=  -> concatinate
         * 
         */


        echo "<br><br>----------ASSIGNMENT OPERATORS----------<br>";
        $x = 12;
        $y = 34;
        echo "<br> X = " . $x . " and Y = " . $y;
        $x += $y;
        echo "<br> SUM(X += Y) : " . $x;
        $x -= $y; // Also overriding the $x value multiple times in this example
        echo "<br> SUB(X -= Y) : " .  $x;
        $x *= $y;
        echo "<br> MUL(X *= Y) : " . $x;
        $x /= $y;
        echo "<br> DIV(X /= Y) : " . $x;
        $x %= $y;
        echo "<br> MOD(X % Y) : " . $x;
        $x **= $y;
        echo "<br> EXPO(X ** Y) : " . $x;

        /**
         * Comparision Operators : Used to compare two variables.
         * Returns : true or false / 1 or 0
         * 
         *  == -> equals to
         *  === -> equal value and data types
         *  != -> not equals
         *  <> -> not equals
         *  !== -> not equal data & data type
         *  > -> greater than
         *  < -> smaller than
         *  >= Greater than or equal to
         *  <= Smaller than or eqaual to
         *  
         */

        echo "<br><br>---------- IF/ ELSEIF STATEMENT----------<br><br>";

        /**
         * if / elseif Operator : if(condition) { // code }
         */

        $age = 30;

        if ($age < 30) {
            echo "Age is smaller than 30";
        } elseif ($age >= 30) {
            echo "Age is greater than 30";
        } else {
            echo "Something else";
        }


        echo "<br><br>----------LOGICAL OPERATOR----------<br><br>";
        /**
         * LOGICAL OPERATOR IN PHP : 
         * && -> AND : TRUE IF BOTH CONDITIONS ARE TRUE
         * || -> OR : TRUE IF ONE OF THE CONDITION IS TRUE ELSE FALSE
         * ! -> NOT : CHECK FOR INVERSE CONDITION
         * and -> AND : 
         * or -> OR
         * xor -> EXCLUSIVE OR : TRUE IF ONE OF THE CONDITIONS IS FALSE / FALSE IF ALL CONDITIONS ARE TRUE OR FALSE. 
         * 
         */

        echo "<br><br>----------SWITCH STATEMENT----------<br><br>";
        /**
         * 
         * Switch Statement : 
         * 
         * 
         * 
         */
        $xx = 1;

        switch ($xx) {
            case 1:
                echo "Its 1";
                break;
            case 2:
                echo "Its 2";
                break;
            case 3:
                echo "Its 3";
                break;
            default:
                echo "Something  else";
        }


        echo "<br><br>----------TERNARY OPERATOR----------<br><br>";

        /**
         * TERNARY OPERATOR : SHORT FORM OF IF ELSE :  (condition) ? statement for true : statement for false;
         * can use only one condition
         * 
         */


        $yy = 100;

        $yy = $yy < 101 ? "Smalller" : "Greater";

        echo $yy . "<br>";


        echo "<br><br>----------STRING OPERATIONS----------<br><br>";

        /**
         * Two types of String operator : 
         * 1.  .(dot) -> $msg . "!!!!";
         * 2.  .=(dot equals) -? $msg .= "adds new line"; 
         * 
         */

        $html = "<br>";
        $html .= "This is a  String Concatination Example";
        $html .= "<br>";

        echo $html;

        echo "<br><br>----------WHILE LOOP----------<br><br>";
        /**
         * WHILE LOOP : Initialize -> check for condition -> if true run code -> increment / decrement 
         * 
         */
        $i = 1; // loop Intialization
        while ($i <= 10) { // loop condition
            $abc =  "loop no ";
            $abc .= $i;
            $abc .= "<br>";

            echo $abc;

            $i++; // altering the condition as per requirement;
        }

        echo "<br><br>----------DO WHILE LOOP----------<br><br>";
        /**
         * DO WHILE LOOP : Initialization -> run code atleast once without checking the condition -> check for condition -> increment / decrment
         * 
         */

        $q = 10; // loop Intialization

        do { // code for execution atleast ocne
            $xyz = "<br>";
            $xyz .= "This is a DO WHILE loop example it will run atleast once ->" . $q;
            $xyz .= "<br>";
            echo $xyz;
            $q++;
        } while ($q < 10); // checking condition


        echo "<br><br>----------FOR LOOP----------<br><br>";

        for ($i = 1; $i < 5; $i++) {
            echo "This is a for loop exmaple {$i} <br>";
        }


        echo "<br><br>----------NESTED FOR LOOP----------<br><br>";

        for ($i = 67; $i < 69; $i++) {
            for ($q = 1; $q <= 10; $q++) {
                echo $i . " X " . $q . " = " . $i * $q;
                echo "<br>";
            }
        }

        echo "<br><br>----------BREAK & CONTINUE STATEMENTS----------<br><br>";
        /**
         * BREAK & CONTINUE STATEMENT  : 
         * Break : It will immidietly stop the execution and exit the statement.
         * Continue : Stop execution and go to the previous statement.
         */
        echo "EVEN/ODD NUMBER LIST(USING CONTINUE STATEMENTS)<br>";
        for ($i = 0; $i < 10; $i++) {
            if ($i % 2 == 0) { // condition
                echo "EVEN NO :{$i} <br>";
                continue; // it will not execute next line but go to the starting of the loop again
            }
            echo "ODD NUMBER : {$i} <br>";
        }
        echo "EXITING THE LOOP WHEN CONTION IS MET<br>";
        for ($i = 0; $i < 100; $i++) {
            if ($i > 10) { // condition
                break; // break will exit program
            }
            echo $i . "<br>";
        }

        echo "<br><br>----------GOTO STATEMENT----------<br><br>";

        for ($i = 0; $i < 10; $i++) {
            if ($i == 3) {
                goto abc; // program will exit and runs the label's statement
            }
            echo "Number is " . $i . "<br>";
        }
        abc:
        echo "This is an example of GOTO statement";


        echo "<br><br>----------FUNCTIONS----------<br><br>";

        function firstFun() // function definition
        {
            echo "This is a simple function<br>";
        }

        firstFun(); // calling a function


        function sum(float $x, float $y): int // passing paraments to function declared with data type
        {
            return $x + $y; // return data.
        }

        echo "Sum is " . sum(23.123, 89.798) . "<br>";


        echo "<br><br>----------FUNCTION ARGUMENT AS REFERENCE----------<br><br>";

        /**
         * FUNCTION ARGUMENTS  : 
         * Function argument can be passed in two ways : 
         * 1. Passing argument by value -> function hello($msg){}
         * 2. Passing argument by reference -> function hello(&$a){}
         */
        $paraValue = "Passing argument by value";
        $paraReference = "Passing argument by reference";

        function printMsg($x, &$y)
        {
            echo "Original Value from inside function : " . $x . "<br>";
            echo "Original Reference Value from inside function :" . $y . "<br>";
            $x = "Overridden Message Value";
            $y = "Overridden Message for Reference value"; // value of referenced variable will be updated.
        }
        echo "Original Value before calling function: " . $paraValue . "<br>";
        echo "Origianl Reference Value before calling function: " . $paraReference . "<br>";

        printMsg($paraValue, $paraReference);

        echo "Original Value after calling function: " . $paraValue . "<br>";
        echo "Origianl Reference Value after calling function: " . $paraReference . "<br>";


        echo "<br><br>----------VARIABLE FUNCTION----------<br><br>";
        /**
         * Variable Function : Function saved inside a variable and called using the variable.
         */

        function myName() // creating a function
        {
            echo "Hello, I am Vikas Thakur<br>";
        }

        $myNameVariable = "myName"; // saaving a function in a variable;

        $myNameVariable(); // calling the function using the variable

        echo "<br><br>----------ANONYMOUS FUNCTION----------<br><br>";
        /**
         * Anonymous Function(closures) : a function with no name 
         * can be used as value passed to a function.
         */


        $anonFunc = function () {
            echo "HIIII!!!<br>";
        };

        $anonFunc();

        echo "<br><br>----------RECURSIVE FUNCTION----------<br><br>";
        /**
         * Recursive Function : Function which calls itself
         */

        function display($num) // a function
        {
            if ($num <= 5) { // condition for calling function
                echo "Number is " . $num . "<br>";
                display($num + 1); // callong the function inside the function
            }
        }

        display(1); // calling the function

        echo "<br><br>----------Factorial of a number using RECURSIVE FUNCTION ----------<br><br>";

        function factorial($n)
        {
            if ($n == 0) {
                return 1;
            } else {
                return ($n * factorial($n - 1));
            }
        }

        echo factorial(11) . "<br>";

        echo "<br><br>----------LOCAL & GLOBAL VARIABLE----------<br><br>";
        /**
         * Local variable : can be accessed inside a function in which it is declared.
         * Global Variable : declared outside the function and can be acessed outside the function.
         * declaring : 
         */
        $varOne = 12;
        $varTwo = 34;

        echo "OLD VARIABLE VALUE : " . $varOne . "<br>";
        function abc()
        {
            global $varOne, $varTwo; // keyword 'global' will be used to access global variable inside function.
            $varOne += $varTwo;
            return $varOne;
        }
        echo "Sum is : " . abc() . "<br>";
        echo "NEW VARIBALE VALUE :" . $varOne . "<br>";

        echo "<br><br>----------INDEXED AND ASSOCIATIVE ARRAYS----------<br><br>";
        /**
         * ARRAY  : php data types which is used to store a collection of values of different data types.
         * TYPES OF ARRAYS : 
         * 1. Indexed Array : array(12,"Tarun",23);
         * 2. Associative Array : key => value pair : array("name" => "Tarun Chauhan","location" => "Shimla");
         * 3. Multidimensional Array : nested array : 
         *              array(
         *                      array("123",2331),
         *                      array("98",789),
         *                      array("89",8797),
         *              );
         *  4. Multidimensinal Associative Array :  nested array with key => value pair
         *             $mulAssocData = [
         *                      "Tarun" => array(
         *                                  "location" => "Chandigarh",
         *                                  "job" => "Software Developer"
         *                                  ),
         *                      "Arun" => array(
         *                                  "location" => "Banglore",
         *                                  "job" => "Software Develoepr"
         *                                  ),
         *                      "Vikas" => array(
         *                                  "location" => "Delhi",
         *                                  "job" => "Frontend Developer"
         *                                  )
         *                              ];
         * 
         *                              
         */

        $numList = array(12, "Tarun", 232.123, true, null); // indexed array
        $numList[5] = "new data";

        var_dump($numList);
        echo "<br>";
        for ($i = 0; $i < sizeof($numList); $i++) {
            echo "Number store at index {$i} -> {$numList[$i]} <br>";
        }
        echo "<pre>";
        print_r($numList);
        echo "</pre>";

        /**
         * Associative array : key/index -> value pair 
         * $list = array("name" => "Tarun Chauhan", "Age" => 33); 
         */

        $data = array("name" => "Tarun Chauhan", "age" => 33, "location" => "Chandigarh"); // associative arrays

        echo "<pre>";
        //print_r($data);
        var_dump($data);
        echo "</pre>";

        /**
         * Foreach loop : used for arrays
         */
        echo "FOREACH LOOP EXAMPLE FOR INDEXED ARRAY<br>";
        foreach ($numList as $value) {
            echo $value . "<br>";
        }

        echo "FOREACH LOOP EXAMPLE FOR ASSOCIATIVE ARRAY<br>";

        foreach ($data as $key => $value) { // foreach with key & vlue pair for associative array
            echo "Indec {$key} -> {$value}<br>";
        }

        echo "<br><br>----------MULTIDIMENSIONAL ARRAYS----------<br><br>";
        /**
         * Multidimensional Array : array of arrays.
         */


        $mulData = [
            ["Tarun Chauhan", "Chandigarh", "PHP Developer"],
            ["Arun Thakur", "Shimla", "Frontend Developer"],
            ["Vikas Rathor", "Kullu", "AWS Engineer"],
            ["Vinita Kumari", "Solan", "Digital Marketing"],
            ["Ashok Singh", "Shimla", "Developer"]
        ];

        echo "<pre>";
        var_dump($mulData);
        print_r($mulData);
        echo "</pre>";

        echo $mulData[1][0] . "<br>";

        echo "<table border='1px' cellpadding='10px'>";
        echo "<tr><td>Name</td> <td>Location</td> <td>Job</td></tr>";
        foreach ($mulData as $arrayOneData) {
            echo "<tr>";
            foreach ($arrayOneData as $data) {
                echo "<td>{$data}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<br><br>----------MULTIDIMENSIONAL ASSOCIATIVE ARRAYS----------<br><br>";
        /**
         * Multidimensional Associative array : 
         * multidimensional array with key -> value
         */


        $mulAssocData = [
            "Tarun" => array(
                "location" => "Chandigarh",
                "job" => "Software Developer"
            ),
            "Arun" => array(
                "location" => "Banglore",
                "job" => "Software Develoepr"
            ),
            "Vikas" => array(
                "location" => "Delhi",
                "job" => "Frontend Developer"
            )
        ];

        echo "<pre>";
        print_r($mulAssocData);
        echo "</pre>";
        /**
         * Using foreach loop to display data from a multidimensional associative array
         */
        foreach ($mulAssocData as $key => $value) {
            echo "Name : {$key} <br>";
            foreach ($value as $index => $data) {
                echo "{$index} => {$data} <br>";
            }
        }
        echo "<br><br>----------LIST FUNCTION WITH MULTIDIMENSIONAL ASSOCIATIVE ARRAYS----------<br><br>";
        /**
         * list() function is used to display data from a multidimensional data. without using nested foreach loops.
         */

        $mda = [
            ["Tarun", 33, 1990, "PHP Developer"],
            ["Arun", 32, 1991, "Frontedn Developer"],
            ["Vikas", 30, 1992, "Graphics Designer"]
        ];

        foreach ($mda as list($name, $age, $yob, $job)) {
            echo "Hello, my name is {$name} , I am {$age} yeaars old and I am a {$job}<br>";
        }

        echo "<br><br>----------Count() & Sizeof() function----------<br><br>";
        /**
         * Count() -> count the number of data in an array.
         * sizeof() -> getting the lenght of an array.
         * 
         */


        $names = ["Tarun", "Tarun", "Varun", "Arun"];

        echo "Lenght of Array : " . sizeof($names) . "--" . count($names) . "<br>";
        echo "Length of MULTI DIM Array (with nested array): " . count($mulAssocData, 1) . "<br>";
        print_r(array_count_values($names));


        echo "<br><br>----------Count() & Sizeof() function----------<br><br>";

        echo "Size of name array using count() : " . count($names) . "<br>";
        echo "size of name array using sizeof() : " . sizeof($names) . "<br>";


        /**ARRAY FUNCTIONS LIST & WORKING (COVER ONE ARRAY FUNCTION TOPIC EVERY DAY)*/

        /**
         * 
         * in_array -> searching element in an array
         * array_seaarch -> search and return the key/index in associative array
         * 
         */

        $fruits = ['apple', 'orange', 'pineapple', 'pear', [1, 34, 53]];
        $info = ["a" => "apple", "b" => "ball", "c" => "cat", "d" => "donkey"];
        echo "in_array EXAMPLE <br> :";
        if (in_array([1, 34, 53], $fruits)) {
            echo "Value Exists<br>";
        } else {
            echo "Value doesn't exists<br>";
        }

        echo "array_search EXAMPLE <br>";
        echo "For associative array : " . array_search("ball", $info) . "<br>";

        /**
         *  array_replace() & array_replace_recursive() : used to replace the elements in an array;
         *  array_replace() -> used with indexed & associative array.
         *  array_replace_recursive() -> used with multidimensional associative array.
         * 
         */


        /**
         * PHP INCLUDE & REQUIRE FUNCTION : both used to includes common files.
         * INCLUDE : if any error happens next code will execute.
         * REQUIRE : if error happens next code will not execute.
         * 
         * PHP INCLUDE_ONCE & REQUIRE_ONCE : both used to include common files but it will be executed once no matter how many times you have used thr function.
         */




        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>