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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>



</head><!--/head-->


<div class="container-xl header">
    <div class="header-left">
        <a href="/" class="btn btn-outline-primary">Задачник</a>
        <a href="/task/add" class="btn btn-primary">Добавить</a>
    </div>
    <div class="git_link"><a href="https://github.com/n4ssek/beejee" class="btn btn-secondary" target="_blank"><img
                src="/template/images/github_icon2w.png" alt="" width="25px" height="25px"> github</a></div>
    <div class="header-right">
        <?php if (!Admin::checkLogged()): ?>
        <a href="/login" class="btn btn-primary">Вход</a>
        <?php else: ?>
        <a href="/logout" class="btn btn-primary">Выход</a>
        <?php endif; ?>
    </div>
</div>


<body>
