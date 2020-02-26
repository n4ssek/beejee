<?php

class Admin
{
    public static function checkAdmin($login, $password)
    {
        return ($login == 'admin' && $password == '123') ? true : false;
    }

    public static function auth() {
        return $_SESSION['admin'] = 'admin';
    }

    public static function checkLogged()
    {
        return (isset($_SESSION['admin'])) ? true : false;
    }
}