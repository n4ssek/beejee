<?php

class Validator
{
    /**
     * @param $value
     * @return string
     */
    public static function clean($value)
    {
        return stripslashes(trim($value));
    }

    /**
     * @param $values
     * @return bool
     */
    public static function isValid($values)
    {
        return strlen($values['name']) < 15 || strlen($values['email'] < 25) || strlen($values['text'] < 80);
    }

    /**
     * @param $arr
     * @return bool
     */
    public static function isEmpty($arr)
    {
        return in_array(null, $arr);
    }
    /**
     * @param $email
     * @return bool
     */
    public static function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}