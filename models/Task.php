<?php

class Task
{
    const TASKS_PER_PAGE = 3;

    public static function getTasksList($page, $count = self::TASKS_PER_PAGE)
    {

        $offset = ($page - 1) * self::TASKS_PER_PAGE;

        $db = Db::getConnection();
        $sql = 'SELECT * FROM tasks ORDER BY date DESC LIMIT :count OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $tasksList = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $tasksList[$i]['id'] = $row['id'];
            $tasksList[$i]['name'] = $row['name'];
            $tasksList[$i]['email'] = $row['email'];
            $tasksList[$i]['text'] = $row['text'];
            $tasksList[$i]['status'] = $row['status'];
            $tasksList[$i]['date'] = $row['date'];
            $i++;
        }

        return $tasksList;
    }

    public static function getTaskById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM tasks WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        return $result->fetch();
    }

    public static function addTask($values)
    {
            $db = Db::getConnection();
            $sql = 'INSERT INTO tasks (name, email, text) 
                     VALUES (:name, :email, :text)';

            $result = $db->prepare($sql);
            $result->bindParam(':name', $values['name']);
            $result->bindParam(':email', $values['email']);
            $result->bindParam(':text', $values['text']);

            return $result->execute();
    }

    public static function editTask($id, $values)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE tasks 
                    SET  name = :name,
                         email = :email,
                         text = :text,
                         date = :date
                    WHERE id = :id';

        $currentDate = date('Y-m-d H:i:s');
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $values['name'], PDO::PARAM_STR);
        $result->bindParam('email', $values['email'], PDO::PARAM_STR);
        $result->bindParam('text', $values['text'], PDO::PARAM_STR);
        $result->bindParam('date', $currentDate);

        return $result->execute();
    }

    public static function getTotalTasks()
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM tasks';

        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();

        return $row['count'];
    }
}