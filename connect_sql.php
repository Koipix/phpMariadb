<?php

//load page even if it fails
try {
    $conn = @mysqli_connect("localhost","root", "pix123", "pix");
} catch (mysqli_sql_exception $e) {
    error_log("DB connection failed: ".mysqli_connect_error());
    $conn = null;
}

?>