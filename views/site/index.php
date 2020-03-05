<?php include ROOT . '/views/layouts/header.php'; ?>



<div class="container-xl">
    <?php Flash::getSuccessMessage(); ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"><a href="#" class="column-sort" id="name" data-order="desc">Имя</a></th>
                <th scope="col"><a href="#" class="column-sort" id="email" data-order="desc">Email</a></th>
                <th scope="col" class="text-cell"><a href="#" class="column-sort" id="text" data-order="desc">Текст</a></th>
                <th scope="col" class="status-cell"><a href="#" class="column-sort" id="status" data-order="desc">Статус</a></th>
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
                <?php if ($task['edited_by_admin'] == true): ?>
                <p class="admin-check">Отредактированно администратором</p>
                <?php endif; ?>
                <?php if(Admin::checkLogged()): ?>
                <a href="/task/edit/<?= $task['id']; ?>">Редактировать</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>




<?php include ROOT . '/views/layouts/footer.php'; ?>