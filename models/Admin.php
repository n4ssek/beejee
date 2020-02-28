<?php

class Admin
{
    /**
     * @param string $login
     * @param string $password
     * @return bool
     */
    public static function checkAdmin($login, $password)
    {
        return ($login == 'admin' && $password == '123') ? true : false;
    }

    /**
     * @return string
     */
    public static function auth() {
        return $_SESSION['admin'] = 'admin';
    }

    /**
     * @return bool
     */
    public static function checkLogged()
    {
        return (isset($_SESSION['admin'])) ? true : false;
    }
}