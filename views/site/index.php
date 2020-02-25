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
        <tr>
            <td>Nikc</td>
            <td>asdddda@mdo.ru</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea molestias mollitia natus nobis optio quisquam sapiente tempore tenetur vel!</td>
            <td>
                <input type="checkbox" class="check-task">
                <p class="admin-check">Отредактированно администратором</p>
            </td>
        </tr>
        <tr>
            <td>Jacob</td>
            <td>@fat</td>
            <td>Thornton</td>
            <td>x</td>
        </tr>
        <tr>
            <td>Larry</td>
            <td>@twitter</td>
            <td>the Bird</td>
            <td>x</td>
        </tr>
        </tbody>
    </table>

    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</div>




<?php include ROOT . '/views/layouts/footer.php'; ?>