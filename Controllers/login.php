<?php
//start session
session_start();

include_once('../Models/User.php');

$user = new User();

if (isset($_POST['login'])) {
    $username = $user->escape_string($_POST['username']);
    $password = $user->escape_string($_POST['password']);

    $auth = $user->check_login($username, $password);

    if (!$auth) {
        $_SESSION['message'] = 'Invalid username or password';
        header('location:http://localhost/Store/Views/admin/admin-login.php');
    } else {
        $_SESSION['user'] = $auth;
        header('location:http://localhost/Store/Views/admin/dashboard.php');
    }
} else {
    $_SESSION['message'] = 'You need to login first';
    header('location:http://localhost/Store/Views/admin/admin-login.php');
}
