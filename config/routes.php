<?php

return [
    //Редактировние, добавление задач
    'task/add' => 'task/add',
    'task/edit/([0-9]+)' => 'task/edit/$1',
    //Логин
    'login' => 'site/login',
    'logout' => 'site/logout',
    //Пагинация
    'page-([0-9]+)' => 'site/index/$1',
    '' => 'site/index'
];