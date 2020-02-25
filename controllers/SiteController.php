<?php

class SiteController
{
    function actionIndex()
    {
        $tasks = Task::getTasksList();

        require_once(ROOT . '/views/site/index.php');

        return true;
    }


}