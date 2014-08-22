<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserRepository {

    public static function get_users() {
        global $db;
        $query = 'SELECT * FROM users ORDER BY uid';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_user_by_uid($uid) {
        global $db;
        $query = 'SELECT * FROM users WHERE uid = :user_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':user_id', $uid);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function get_user_by_email($email) {
        global $db;
        $query = 'SELECT * FROM users WHERE email = :email';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function add_user($uname, $email, $birth, $pwd) {
        global $db;
        $query = 'INSERT INTO users (uname, email, birth, is_admin, pwd, join_date) VALUES (:username, :email, :birth, 0, :password, :join_date)';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $uname);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':birth', $birth);
            $statement->bindValue(':password', sha1($pwd));
            $statement->bindValue(':join_date', date("Y-m-d"));
            $statement->execute();
            $statement->closeCursor();
            // Get the last product ID that was automatically generated
            $user_id = $db->lastInsertId();
            return $user_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function update_pwd($pwd, $uid) {
        global $db;
        $query = 'UPDATE users SET pwd = :pwd WHERE uid = :uid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':pwd', sha1($pwd));
            $statement->bindValue(':uid', $uid);
            $statement->execute();
            $success = ($statement->rowCount() >= 1);
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function update_username($uname, $uid) {
        global $db;
        $query = 'UPDATE users SET uname = :uname WHERE uid = :uid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':uname', $uname);
            $statement->bindValue(':uid', $uid);
            $statement->execute();
            $success = ($statement->rowCount() >= 1);
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function update_birth($birth, $uid) {
        global $db;
        $query = 'UPDATE users SET birth = :birth WHERE uid = :uid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':birth', $birth);
            $statement->bindValue(':uid', $uid);
            $statement->execute();
            $success = ($statement->rowCount() >= 1);
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }    
        public static function update_email($email, $uid) {
        global $db;
        $query = 'UPDATE users SET email = :email WHERE uid = :uid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':uid', $uid);
            $statement->execute();
            $success = ($statement->rowCount() >= 1);
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function update_photo($img, $uid) {
        global $db;
        $query = 'UPDATE users SET img = :img WHERE uid = :uid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':img', $img);
            $statement->bindValue(':uid', $uid);
            $statement->execute();
            $success = ($statement->rowCount() >= 1);
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function delete_user_by_id($uid){
        global $db;
        $query = 'DELETE FROM users WHERE uid = :uid';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':uid', $uid);
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

