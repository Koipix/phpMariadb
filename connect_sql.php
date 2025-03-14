<?php
//load page even if it fails
$host = "localhost";
$user = "root";
$pass = 'pix123';
$db = "userdb";

try {
    $conn = @mysqli_connect($host, $user, $pass, $db);
} catch (mysqli_sql_exception $e) {
    error_log("DB connection failed: ".mysqli_connect_error());
    $conn = null;
}

$status = $conn ? "Connected" :"Disconnected";
?>