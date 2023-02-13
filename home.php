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
         * While loop : Initialize -> check for condition -> if true run code -> increment / decrement 
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
         * Do While loop : Initialization -> run code atleast once without checking the condition -> check for condition -> increment / decrment
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
         * Break & continue statements : 
         * Break : it will immiditly stop the execution and exit the statemnt
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

        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>