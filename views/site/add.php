<?php include ROOT . '/views/layouts/header.php'; ?>


<div class="container-lg add-form">
    <form method="post" action="#" enctype="multipart/form-data">
        <h1>Добавить задачу</h1>
        <?= $errors[0]; ?>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Имя" name="name">
            </div>
            <div class="col">
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текст задачи</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
        </div>
        <input class="btn btn-primary form-btn" type="submit" name="submit" value="Сохранить">
    </form>
</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>
