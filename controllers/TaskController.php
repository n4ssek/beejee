<?php

class TaskController
{
    function actionEdit($taskId)
    {
        //Редактирование доступно только администратору- проверяем залогинен ли администратор
        if (Admin::checkLogged()) {
            //Данные для вывода сообщения о том что задача отредактирована администратором
            $taskProperties = Task::getTaskById($taskId);

            if (isset($_POST['submit'])) {
                $values['name'] = $_POST['name'];
                $values['email'] = $_POST['email'];
                $values['text'] = $_POST['text'];
                $values['status'] = $_POST['status'];

                $errors = false;
                if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['text'])) {
                    //Сообщение об ошибке если поля пустые
                    $errors[] = 'Заполните все поля';
                }
                if ($taskProperties['text'] != $values['text']) {
                    Task::editedByAdminTask($taskId);
                }
                if ($errors == false) {
                    //Редактирование задачи, установка сортировки по дате и перенаправление на главную
                    Task::editTask($taskId, $values);
                    Task::setDateOrder();
                    Flash::setEditSuccessMessage();

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
                //Если поля не заполнены выводим сообщение об ошибке
                $errors[] = 'Заполните все поля';
            }

            if ($errors == false) {
                //Добавление задачи, установка сортировки по дате и перенаправление на главную
                Task::addTask($values);
                Task::setDateOrder();
                Flash::setAddSuccessMessage();

                header("Location: /");
            }
        }



        require_once(ROOT . '/views/site/add.php');

        return true;
    }
}