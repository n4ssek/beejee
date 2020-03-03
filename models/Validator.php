<?php

class Validator
{
    /**
     * @param $value
     * @return string
     */
    public static function clean($value)
    {
        return stripcslashes(trim($value));
    }

    public static function validate($value)
    {
        return preg_match("/[a-zA-Z0-9 ]+/", $value);
    }
    /**
     * @param $email
     * @return bool
     */
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ?  true : false;
    }
}