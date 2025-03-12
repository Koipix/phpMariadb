<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/login':
        require 'login.php';
        break;
    case '/register':
        require 'register.php';
        break;
    case '/home':
        require 'homepage.php';
        break;
    case '/admin':
        require 'index.php';
        break;
    default:
        header("Location: login");
        require 'login.php';
        break;
}
?>