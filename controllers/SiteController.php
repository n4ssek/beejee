<?php

class SiteController
{
    function actionIndex()
    {
        //Передаем массив с заданиями из бд во вью
        $tasks = Task::getTasksList();

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    function actionLogin()
    {

        $username = Validator::clean($_POST['username']);
        $password = Validator::clean($_POST['password']);


        if (isset($_POST['submit'])) {
            //Если поля пустые выводится сообщение об ошибке
            if (empty($username) || empty($password)) {
                Flash::setBlankFieldsFailureMessage();
            }

            $admin = Admin::checkAdmin($username, $password);
            //Если введены неверные данные выводится сообщение об ошибке
            if ($admin == false) {
                Flash::setWrongDataFailureMessage();
            } else {
                //Авторизация и перенаправление на главную страницу
                Admin::auth();
                Flash::setLoginSuccessMessage();
                header("Location: /");
            }
        }

        require_once(ROOT. '/views/site/login.php');

        return true;
    }

    function actionLogout()
    {
        unset($_SESSION['admin']);

        header("Location: /");
    }

}