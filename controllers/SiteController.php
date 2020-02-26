<?php

class SiteController
{
    function actionIndex($page = 1)
    {
        $tasks = Task::getTasksList($page);
        $total = Task::getTotalTasks();


        $pagination = new Pagination($total, $page, Task::TASKS_PER_PAGE, 'page-');

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    function actionLogin()
    {
        $errors = false;
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (isset($_POST['submit'])) {
            if (empty($username) || empty($password)) {
                $errors[] = 'Заполните все поля';
            }

            $admin = Admin::checkAdmin($username, $password);
            if ($admin == false) {
                $errors[] = 'Введены неверные данные';
            } else {
                Admin::auth();

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