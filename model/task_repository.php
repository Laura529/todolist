<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TaskRepository {

    public static function get_tasks($uid) {
        global $db;
        $query = 'SELECT * FROM tasks WHERE uid = :uid ORDER BY due';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':uid', $uid);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function get_task_by_id($tid) {
        global $db;
        $query = 'SELECT * FROM tasks WHERE tid = :tid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':tid', $tid);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function get_tasks_by_type($type) {
        global $db;
        $query = 'SELECT * FROM tasks WHERE type = :type ORDER BY due';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':uid', $uid);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function add_task($uid, $due, $desc, $type, $description) {
        global $db;
        $query = 'INSERT INTO tasks (uid, due, content, type, description) VALUES (:uid, :due, :desc, :type, :description)';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':uid', $uid);
            $statement->bindValue(':due', $due);
            $statement->bindValue(':desc', $desc);
            $statement->bindValue(':type', $type);
            $statement->bindValue(':description', $description);
            $statement->execute();
            $statement->closeCursor();
            // Get the last product ID that was automatically generated
            $tid = $db->lastInsertId();
            return $tid;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function update_task($due_date, $content, $category, $tid) {
        global $db;
        $query = 'UPDATE tasks SET due = :due_date, content = :content, description = :category WHERE tid = :tid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':due_date', $due_date);
            $statement->bindValue(':content', $content);
            $statement->bindValue(':category', $category);
            $statement->bindValue(':tid', $tid);
            $statement->execute();
            $success = ($statement->rowCount() >= 1);
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
        public static function update_task_type($tid, $type) {
        global $db;
        $query = 'UPDATE tasks SET type = :type WHERE tid = :tid';
        try {
            $statement = $db->prepare($query);
            if($type == 0) {
                $statement->bindValue(':type', '1');
            } else {
                $statement->bindValue(':type', '2');
            }
            $statement->bindValue(':tid', $tid);
            $statement->execute();
            $success = ($statement->rowCount() >= 1);
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function delete_task_by_id($tid){
        global $db;
        $query = 'DELETE FROM tasks WHERE tid = :tid';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':tid', $tid);
	        $statement->execute();
                $result =  ($statement->rowCount() > 0);
	        $statement->closeCursor();
                return $result;
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
    }
}
?>

