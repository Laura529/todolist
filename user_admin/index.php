<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../model/db_connect.php';
require '../model/task_repository.php';
require '../model/user_repository.php';

session_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'user_home';
}

if ($action == 'user_home') {
    $tasks = TaskRepository::get_tasks($_SESSION['user_id']);
    include 'user_home.php';
} else if ($action == 'add_task') {
    if(isset($_POST['user_home_due1'])){
        $due_date = $_POST['user_home_due1'];
    } else {
        $due_date = $_POST['user_home_due2'];
    }
    
    if(isset($_POST['user_home_title1'])){
        $content = $_POST['user_home_title1'];
    } else {
        $content = $_POST['user_home_title2'];
    }
    
    if(isset($_POST['user_home_desc1'])){
        $description = $_POST['user_home_desc1'];
    } else {
        $description = $_POST['user_home_desc2'];
    }
    
    $type = $_POST['category'];
    $uid = $_SESSION['user_id'];
    
    $tid = TaskRepository::add_task($uid, $due_date, $content, $type, $description);
    
    $tasks = TaskRepository::get_tasks($uid);
    header("Location: ?action=user_home&tasks=".$tasks);
} else if ($action == 'edit_item') {
    $tid = $_GET['tid'];
    $task = TaskRepository::get_task_by_id($tid);
    if (!empty($task)) {
        include 'task_form.php';
    }
} else if ($action == 'edit') {
    $due_date = $_POST['due'];
    $content = $_POST['task_title'];
    $category = $_POST['task_desc'];
    $tid = $_POST['tid'];
    $result = TaskRepository::update_task($due_date, $content, $category, $tid);
    header('Location: ?action=user_home');
} else if ($action == 'delete_task') {
    $tid = $_GET['tid'];
    echo $tid;
    $result = TaskRepository::delete_task_by_id($tid);
    header('Location: ?action=user_home');
} else if ($action == 'user_form') {
    include 'profile_form.php';
} else if ($action == 'edit_img') {
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    $msg1='';

    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 20000) && in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
            $msg1 = "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } else {
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                $msg1 = $_FILES["file"]["name"] . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                $result = UserRepository::update_photo($_FILES["file"]["name"], $_SESSION['user_id']);
                $_SESSION['img'] = $_FILES["file"]["name"];
            }                    
        }
    } else {
        $msg1 =  "Invalid file";
    }
    header('Location: ?action=user_form&msg1='.$msg1);
} else if($action == 'edit_type'){
    $tid = $_GET['tid'];
    $type = $_GET['type'];
    $result = TaskRepository::update_task_type($tid, $type);
    header('Location: ?action=user_home');
} else if ($action == 'edit_uname') {
    $uname = $_POST['uname'];
    $result = UserRepository::update_username($uname, $_SESSION['user_id']);
    $_SESSION['username'] = $uname;
    header('Location: ?action=user_form');
} else if ($action == 'edit_email') {
    $email = $_POST['email'];
    $result = UserRepository::get_user_by_email($email);
    $msg1 = '';
    if(empty($result) || $result['email'] == $_SESSION['email']) {
        if (empty($result)){
            $success = UserRepository::update_email($email, $_SESSION['user_id']);
            $_SESSION['email'] = $email;
        }       
    } else {
        $msg1 = 'Email already exists';
    }
    header('Location: ?action=user_form&msg1='.$msg1);
} else if ($action == 'edit_birth') {
    $birth = $_POST['birth'];
    $result = UserRepository::update_birth($birth, $_SESSION['user_id']);
    $_SESSION['birth'] = $birth;
    header('Location: ?action=user_form');
} else if ($action == 'edit_pwd') {
    $pwd = $_POST['pwd1'];
    $result = UserRepository::update_pwd($pwd, $_SESSION['user_id']);
    $_SESSION['pwd'] = sha1($pwd);
    $msg1 = 'Password Changed';
    header('Location: ?action=user_form&msg1='.$msg1);
}
?>

