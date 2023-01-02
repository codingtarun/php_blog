<?php

namespace Helper;

class Error
{
    public static $nameValidationError =  "Name must be between 2 to 25 character";
    public static $emailValidationError = "Invalid Email Address";
    public static $usernameValidationError = "User name error";
    public static $passwordValidationError = "Password Error";
    public static $passwordValidationMismatchedError = "Password mismathced error";
    public static $usernameValidationAlreadyTakenError = "User name already taken";
    public static $emailValidationAlreadyTakenError = "Email Id already taken";
    public static $userNotFoundError = "User Not Found";
}
