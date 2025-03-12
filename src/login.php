<?php
        session_start();
        require "connect_sql.php";
        $status = "";
        $message = "";

        if ($conn) {
            $status = "Connected";
        } else {
            $status = "Disconnected";
        }

        if (isset($_POST["submit"]) && $conn) {

        }
    ?>