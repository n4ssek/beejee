<?php

class SiteController
{
    function actionIndex($page = 1)
    {
        $page = intval($page);
        $tasks = Task::getTasksList($page);
        $total = Task::getTotalTasks();


        $pagination = new Pagination($total, $page, Task::TASKS_PER_PAGE, 'page-');

        require_once(ROOT . '/views/site/index.php');

        return true;
    }


}