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

        $errors = false;
        $username = $_POST['username'];
        $password = $_POST['password'];


        if (isset($_POST['submit'])) {
            //Если поля пустые выводится сообщение об ошибке
            if (empty($username) || empty($password)) {
                $errors[] = 'Заполните все поля';
            }

            $admin = Admin::checkAdmin($username, $password);
            //Если введены неверные данные выводится сообщение об ошибке
            if ($admin == false) {
                $errors[] = 'Введены неверные данные';
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