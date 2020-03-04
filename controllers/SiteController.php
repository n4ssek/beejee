<?php

class SiteController
{
    function actionIndex()
    {
        $tasks = Task::getTasksList();


        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    function actionLogin()
    {
        $errors = false;
        $username = Validator::clean($_POST['username']);
        $password = Validator::clean($_POST['password']);

        if (isset($_POST['submit'])) {
            if (empty($username) || empty($password)) {
                $errors[] = Flash::setBlankFieldsFailureMessage();
            }

            $admin = Admin::checkAdmin($username, $password);
            if ($admin == false) {
                $errors[] = Flash::setWrongDataFailureMessage();
            } elseif ($errors == false) {
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