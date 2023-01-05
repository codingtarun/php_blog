<?php

namespace Helper;

use Helper\Sanitizer as Sanitizer;

class Faker
{
    public $small_chars = 'abcdefghijklmnopqrstuvwxyz';
    public $cap_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    public $num = '0123456789';
    public $symbols = '~!@#$%^&*()_+{}|:"<>?';
    public $name;
    public $username;
    public $email;
    public function fakeName()
    {
        $this->name = '';
        for ($i = 0; $i < rand(3, 7); $i++) {
            $this->name .= $this->small_chars[rand(0, strlen($this->small_chars) - 1)];
        }

        return Sanitizer::name($this->name);
    }
    public function fakeUsername()
    {
        $this->username = '';
        for ($i = 0; $i < rand(6, 13); $i++) {
            $this->username .= $this->small_chars[rand(0, strlen($this->small_chars) - 1)];
        }

        return Sanitizer::username($this->username);
    }
    public function fakeEmail()
    {
        $this->email = '';
        for ($i = 0; $i < rand(5, 10); $i++) {
            $this->email .= $this->small_chars[rand(0, strlen($this->small_chars) - 1)];
        }
        $this->email .= '@xyz.com';

        return Sanitizer::email($this->email);
    }
    public function fakePassword()
    {
        return 'abc@123';
    }
}
