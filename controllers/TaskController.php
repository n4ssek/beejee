<?php

class TaskController
{
    function actionEdit($taskId)
    {
        if (Admin::checkLogged()) {
            $taskProperties = Task::getTaskById($taskId);

            if (isset($_POST['submit'])) {
                $values['name'] = $_POST['name'];
                $values['email'] = $_POST['email'];
                $values['text'] = $_POST['text'];
                $values['status'] = $_POST['status'];

//                var_dump($values['text']);
                $errors = false;
                if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['text'])) {
                    $errors[] = 'Заполните все поля';
                }
                if ($taskProperties['text'] != $values['text']) {
                    Task::editAdminTask($taskId);
                }
                if ($errors == false) {
                    Task::editTask($taskId, $values);
                    header("Location: /");
                }
            }

            require_once(ROOT . '/views/site/edit.php');

            return true;
        }

        echo 'Доступ к редактированию запрещен';

        return true;
    }

    function actionAdd()
    {

        if (isset($_POST['submit'])) {
            $values['name'] = $_POST['name'];
            $values['email'] = $_POST['email'];
            $values['text'] = $_POST['text'];

            $errors = false;
            if (empty($values['name']) || empty($values['email']) || empty($values['text'])) {
                $errors[] = 'Заполните все поля';
            }

            if ($errors == false) {
                Task::addTask($values);
                header("Location: /");
            }
        }



        require_once(ROOT . '/views/site/add.php');

        return true;
    }
}