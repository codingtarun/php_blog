<?php

/**
 * 
 * PHP GLOBAL VARIABLES : superglobal
 * Built in PHP variables that are always available in all scopes.
 * Can be accessed from any class, function or file without doing anything special.
 * 
 * 1. $$GLOBALS
 * 2. $_SERVER
 * 3. $_REQUEST
 * 4. $_POST
 * 5. $_GET
 * 6. $_FILES
 * 7. $_ENV
 * 8. $_COOKIE
 * 9. $_SESSION
 * */


/**
 * $_POST : 
 * 1. Catch data sent with POST method.
 * 2. Transfer information via HTTP header.
 * 3. Information is not visible in header.
 * 4. Unlimited amout of information can be sent.
 * 5. Use to send senstive data , binary data  and uploading files.
 * 6. Secure
 * 7. Bookmarking not possible.
 */

/**
 * $_GET : catch data sent with GET method
 * 1. Sends information by appending them to the page request.
 * 2. Information in visible in URL.
 * 3. Limited amount of data can be sent(<1500 characters).
 * 4. Only send non senstive data.
 * 5. Not secure for sending senstive data.
 * 6. Possible to bookmark
 */

/**
 * $_REQUEST : 
 * 1. Catch data which is sent either with POST or GET.
 * 2. 
 */
