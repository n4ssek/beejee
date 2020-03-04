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

    public static function setBlankFieldsFailureMessage()
    {
        return "<div class=\"alert alert-danger\">Заполните все поля</div>";
    }

    public static function setCountCharFailureMessage()
    {
        return "<div class=\"alert alert-danger\">Имя до 15, Email до 25 и текст до 80 символов</div>";
    }

    public static function setWrongDataFailureMessage()
    {
        return "<div class=\"alert alert-danger\">Введены неверные данные</div>";
    }

    public static function setEmailFailureMessage()
    {
        return "<div class=\"alert alert-danger\">Введите корректный email вида - example@test.com</div>";
    }
    public static function getSuccessMessage()
    {
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
}