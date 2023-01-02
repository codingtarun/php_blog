<?php

namespace Helper;

class Sanitizer
{
    public static function name($input)
    {
        $input = strip_tags($input);
        $input = strtolower($input);
        $input = ucfirst($input);
        return $input;
    }
    public static function username($input)
    {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        $input = strtolower($input);
        return $input;
    }
    public static function email($input)
    {
        $input = strip_tags($input);
        $input = strtolower($input);
        $input = str_replace(" ", '', $input);
        return $input;
    }
    public static function password($input)
    {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }
    public static function title($input)
    {
        $input = strip_tags($input);
        return $input;
    }
    public static function text($input)
    {
        return $input;
    }
}
