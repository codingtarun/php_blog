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
         * Data Types 
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
         *  var_dump() -> Knowing the data type 
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
         * Constant Variables : Defining a variable which can't be changed later at any point.
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
         * Arithmatic Operators : 
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
         *  Assignment Operators :  Arithmatic operators used with =.
         *  =  ->  X = Y ->  Y = X
         *  += ->  X += Y  -> X = X + Y 
         *  -= -> X -= Y -> X = X - Y
         *  *= -> X *= Y -> X = X * Y
         *  /= -> X /= Y -> X = X / Y
         *  %= -> X %= Y -> X = X % Y
         *  **= -> X **= Y -> X = X ** Y
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
         * LOGICAL OPERATOR : 
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
         * Ternary Operator: Syntex -> (constion) ? statement for true : statement for false;
         * can use only one condition
         * 
         */


        $yy = 100;

        $yy = $yy < 101 ? "Smalller" : "Greater";

        echo $yy . "<br>";
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>