<?php
$request = $_SERVER['REQUEST_URI'];

#catch for api calls
if (strpos($request, "/api/") === 0) {
    require __DIR__ . $request;
    exit();
}

switch ($request) {
    case '/login':
        require './Pages/login_page.php';
        break;
    case '/register':
        require './Pages/register_page.php';
        break;
    case '/home':
        require './Pages/home_page.php';
        break;
    case '/admin':
        require './Pages/admin_page.php';
        break;
    case '/test':
        require '/status.php';
        break;
    default:
        header("Location: register");
        require './Pages/register_page.php';
        break;
}
?>