<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Beejee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/template/css/style.css">
</head><!--/head-->


<div class="container-xl header">
    <div class="header-left">
        <a href="/" class="btn btn-outline-primary">Задачник</a>
        <a href="/task/add" class="btn btn-primary">Добавить</a>
    </div>

    <div class="header-right">
        <?php if (!Admin::checkLogged()): ?>
        <a href="/login" class="btn btn-primary">Вход</a>
        <?php else: ?>
        <a href="/logout" class="btn btn-primary">Выход</a>
        <?php endif; ?>
    </div>
</div>


<body>
