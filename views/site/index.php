<?php include ROOT . '/views/layouts/header.php'; ?>



<div class="container-xl">

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col"><a href="#">Имя</a></th>
            <th scope="col"><a href="#">Email</a></th>
            <th scope="col" class="text-cell"><a href="#">Текст</a></th>
            <th scope="col" class="status-cell"><a href="#">Статус</a></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= $task['name']; ?></td>
            <td><?= $task['email']; ?></td>
            <td class="text-cell"><?= $task['text']; ?></td>
            <td>
                <?php if ($task['status'] == true): ?>
                <img src="/template/images/check.jpg" alt="" width="50px" height="50px">
                <?php endif; ?>
                <p class="admin-check">Отредактированно администратором</p>
                <?php if(Admin::checkLogged()): ?>
                <a href="/task/edit/<?= $task['id']; ?>">Редактировать</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?= $pagination->get(); ?>
</div>




<?php include ROOT . '/views/layouts/footer.php'; ?>