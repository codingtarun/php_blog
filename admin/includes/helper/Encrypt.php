<?php
class Encrypt
{
    public static function hash($input)
    {
        return hash("sha512", $input);
    }
}
