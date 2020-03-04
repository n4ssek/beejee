<?php

class TaskController
{
    function actionEdit($taskId)
    {
        //Доступ к редактированию если пользователь является администратором
        if (Admin::checkLogged()) {
            $taskProperties = Task::getTaskById($taskId);

            if (isset($_POST['submit'])) {
                $values['name'] = Validator::clean($_POST['name']);
                $values['email'] = Validator::clean($_POST['email']);
                $values['text'] = Validator::clean($_POST['text']);
                $values['status'] = Validator::clean($_POST['status']);

                $errors = false;
                //Если поля пустые выводим ошибку
                if (Validator::isEmpty($values)) {
                    $errors[] = Flash::setBlankFieldsFailureMessage();
                }
                //Если введенные данные больше заданного количества сиволов выводим ошибку
                if (!Validator::isValid($values)){
                    $errors[] = Flash::setCountCharFailureMessage();
                }
                //Если email не валиден выводим ошибку
                if (!Validator::validEmail($values['email'])) {
                    $errors[] = Flash::setEmailFailureMessage();
                }
                //Установка флага "Отредактированно администратором" при редактировании текста
                if ($taskProperties['text'] != $values['text']) {
                    Task::editedByAdminTask($taskId);
                    // Ошибок нет - вносим изменения по задаче в бд и перенаправляем на главную
                } elseif ($errors == false) {
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
            $values['name'] = Validator::clean($_POST['name']);
            $values['email'] = Validator::clean($_POST['email']);
            $values['text'] = Validator::clean($_POST['text']);

            $errors = false;

            //Если поля пустые выводим ошибку
            if (Validator::isEmpty($values)) {
                $errors[] = Flash::setBlankFieldsFailureMessage();
            }
            //Если введенные данные больше заданного количества сиволов выводим ошибку
            if (!Validator::isValid($values)){
                $errors[] = Flash::setCountCharFailureMessage();
            }
            //Если email не валиден выводим ошибку
            if (!Validator::validEmail($values['email'])) {
                $errors[] = Flash::setEmailFailureMessage();
            }
            // Ошибок нет - добавляем задачу в базу и устанавливаем порядок по дате
            if ($errors == false) {
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