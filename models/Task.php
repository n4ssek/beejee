<?php

class Task
{
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