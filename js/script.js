/**
 * JAVASCRIPT : 
 * 1. High level
 * 2. Object-oriented : stores most kind of data into objects
 * 3. Multi-paradigm 
 * 4. controls the behavious of web page.
 * 
 */
console.log("HELLO JAVASCRIPT");

/**
 * VALUES & VARIABLE : 
 * VALUE : Piece of data.
 * VARIABLE : Used to store the value.
 * 
 */

let fName = "Tarun"; // 'fName' is variable & 'Tarun' is value

console.log(fName);

/**
 * DATA TYPES : Type of data JS can hold.
 * Every value is either an object or primitive datatypes.
 * Primitive Data Types : 
 * 1. Number
 * 2. String
 * 3. Boolean
 * 4. Undefined
 * 5. Null
 * 6. Symbol(ES2015)
 * 7. BigInt(ES2020)
 * 
 * JS has DYNAMIC TYPING : JS automatically determines what kind of data type is defined. 
 * 
 * VALUE HAS DATA TYPE , NOT VARIABLE
 * 
 */

let x = null; // INITIALLY VALUE OF 'x' IS NULL
console.log("Value of x " + x);

x = 100; // DYNAMIC TYPING
console.log("Numberic data type stored in 'x' variable : " + x);

x = "Tarun"; // DYNAMIC TYPING
console.log("String data type stored in 'x' variable :" + x);

let isActive = false;

if (isActive) {
    console.log("Is Active");
} else {
    console.log("Is Inactive");
}

console.log(typeof (isActive)); // function to find the data type

/**
 * Accessing the button from page using ID
 */

function changeTitle() {
    document.getElementById("test_btn").innerHTML = "OK";
    console.log("BUTTON CLICKED!!!!");
}

/**
 * JS Variables : 
 * 1. Fixed Values : Literals
 * 2. Variable Values : Variables
 */


