<?php

class Task
{
    public static function getTasksList($count = 3)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM tasks ORDER BY date ASC LIMIT :count';

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
}