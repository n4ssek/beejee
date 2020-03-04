<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="container-lg add-form">
        <form method="post" action="#" enctype="multipart/form-data">
            <h1>Вход в админ панель</h1>
            <?= $errors[0]; ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Имя пользователя</label>
                <input type="username" class="form-control"  name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" name="password">
            </div>
            <input class="btn btn-primary form-btn" type="submit" name="submit" value="Войти">
        </form>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>