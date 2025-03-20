<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit();
    }

    if ($_SESSION['user']['admin'] == 1) {
        $isAdmin = true;
    } else {
        $isAdmin = false;
    }
?>