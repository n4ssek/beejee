<?php

class Task
{

    const TASKS_PER_PAGE = 3;

    /**
     * @param int $page
     * @return array
     */
    public static function getTasksList($page = 1)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM tasks ORDER BY date DESC';

        $result = $db->prepare($sql);
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
            $tasksList[$i]['edited_by_admin'] = $row['edited_by_admin'];
            $tasksList[$i]['date'] = $row['date'];
            $i++;
        }

        return $tasksList;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getTaskById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM tasks WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        return $result->fetch();
    }

    /**
     * @param $values
     * @return bool
     */
    public static function addTask($values)
    {
            $db = Db::getConnection();
            $sql = 'INSERT INTO tasks (name, email, text) 
                     VALUES (:name, :email, :text)';

            $result = $db->prepare($sql);
            $result->bindParam(':name', htmlspecialchars($values['name']));
            $result->bindParam(':email', htmlspecialchars($values['email']));
            $result->bindParam(':text', htmlspecialchars($values['text']));

            return $result->execute();
    }

    /**
     * @param $id
     * @param $values
     * @return bool
     */
    public static function editTask($id, $values)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE tasks 
                    SET  name = :name,
                         email = :email,
                         text = :text,
                         status = :status,
                         date = :date
                    WHERE id = :id';

        $currentDate = date('Y-m-d H:i:s');
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $values['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $values['email'], PDO::PARAM_STR);
        $result->bindParam(':text', $values['text'], PDO::PARAM_STR);
        $result->bindParam(':status', $values['status']);
        $result->bindParam(':date', $currentDate);

        return $result->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public static function editedByAdminTask($id)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE tasks SET edited_by_admin = 1 WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    /**
     * @return bool
     */
    public static function setDateOrder()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM tasks ORDER BY date DESC';

        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->execute();
    }
}