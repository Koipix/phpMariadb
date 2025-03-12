<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/login':
        require 'login.php';
        break;
    case '/signup':
        require 'signup.php';
        break;
    default:
        require 'index.php';
        break;
}
?>