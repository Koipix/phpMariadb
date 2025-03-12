<?php
        session_start();
        require "connect_sql.php";
        
        if ($_SERVER["REQUEST_METHOD"] === "POST" && $conn) {
            $username = $_POST["user"];
            $password = $_POST["pass"];

            $query = "SELECT * FROM users WHERE 
                      username='$username' AND 
                      password='$password'";

            $check_query = mysqli_query($conn, $query);

            if (mysqli_num_rows($check_query) === 1) {
                $_SESSION['user'] = $username;
                echo json_encode(["success" => true, "redirect" => "/home"]);
                exit();
            } else {
                echo json_encode(["success" => false, "message" => "Account doesn't exist!"]);
            }
        }
    ?>