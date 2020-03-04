<?php

class TaskController
{
    function actionEdit($taskId)
    {
        if (Admin::checkLogged()) {
            $taskProperties = Task::getTaskById($taskId);

            if (isset($_POST['submit'])) {
                $values['name'] = Validator::clean($_POST['name']);
                $values['email'] = Validator::clean($_POST['email']);
                $values['text'] = Validator::clean($_POST['text']);
                $values['status'] = Validator::clean($_POST['status']);

                $errors = false;
                if (Validator::isEmpty($values)) {
                    $errors[] = Flash::setBlankFieldsFailureMessage();
                }
                if ($taskProperties['text'] != $values['text']) {
                    Task::editedByAdminTask($taskId);
                } elseif ($errors == false) {
                    Task::editTask($taskId, $values);
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
            if (Validator::isEmpty($values)) {
                $errors[] = Flash::setBlankFieldsFailureMessage();
            }

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