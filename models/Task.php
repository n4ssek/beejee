<?php

class Task
{
    public static function getTasksList($count = 3)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM tasks ORDER BY date DESC LIMIT :count';

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
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
}