<?php

class Flash
{
    public static function setAddSuccessMessage()
    {
        return $_SESSION['message'] = "<div class=\"alert alert-success\">Задание успешно добавлено</div>";
    }

    public static function setEditSuccessMessage()
    {
        return $_SESSION['message'] = "<div class=\"alert alert-success\">Задание успешно изменено</div>";
    }

    public static function setLoginSuccessMessage()
    {
        return $_SESSION['message'] = "<div class=\"alert alert-success\">Вы вошли как администратор</div>";
    }

    public static function getSuccessMessage()
    {
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
}