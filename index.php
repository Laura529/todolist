<?php
require '/model/db_connect.php';
require '/model/user_repository.php';

session_start();
$error_msg = '';

if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'homepage';
}

if ($action == 'homepage') {
    if (isset($_SESSION['user_id'])) {
        header("Location: ./user_admin/");
    } else {
        include "homepage.php";
    }
} else if ($action == 'user_form') {
    include 'register.php';
} else if ($action == 'signup') {
    $uname = trim($_POST['username']);
    $pwd = trim($_POST['pwd1']);
    $email = trim($_POST['email1']);
    $birth = trim($_POST['birth']);
    
    $result = UserRepository::get_user_by_email($email);
    if(!empty($result)){
        $msg1 = 'Email already exists';
    }
    if (isset($msg1)) {
        include 'register.php';
    } 
    else {
        $uid = UserRepository::add_user($uname, $email, $birth, $pwd);
        $_SESSION['user_id'] = $uid;
        $_SESSION['username'] = $uname;
        $_SESSION['email'] = $email;
        $_SESSION['birth'] = $birth;
        $_SESSION['img'] = 'default.jpg';
        $_SESSION['pwd'] = sha1($pwd);
        header('Location: ./user_admin');
    }
} else if ($action == 'login') {
    echo 'test';
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    
    $result = UserRepository::get_user_by_email($email);
    if(empty($result)){
        $msg1 = 'you don\'t hava an account yet';
        include 'homepage.php';;
    } else if(sha1($pwd) != $result['pwd']){
        $msg1 = 'password not correct';
        include 'homepage.php';
    } else {
        $_SESSION['user_id'] = $result['uid'];
        $_SESSION['username'] = $result['uname'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['birth'] = $result['birth'];
        if(empty($result['img'])){
            $result['img'] = 'default.jpg';
        }
        echo $result['img'];
        $_SESSION['img'] = $result['img'];
        $_SESSION['pwd'] = $result['pwd'];
        header('Location: user_admin/');
    }
} else if($action == 'logout'){
    $_SESSION = array();
    session_destroy();
    header('Location: ?action=homepage');
} 
?>
