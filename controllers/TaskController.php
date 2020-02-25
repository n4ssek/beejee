<?php

class TaskController
{
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