    <?php
        header("Content-Type: text/plain");
        session_start();
        require "connect_sql.php";
        $status = "";
        $message = "";

        if ($conn) {
            $status = "Connected";
        } else {
            $status = "Disconnected";
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && $conn) {
            $username = $_POST["user"];
            $password = $_POST["pass"];
            $conf_password = $_POST["confpass"];
            
            //check if passwd matches
            if ($password === $conf_password) {
                $check_query = "SELECT * FROM users WHERE username = '$username'";
                $check_query = mysqli_query($conn, $check_query);
    
                if (mysqli_num_rows($check_query) > 0) {
                    echo "Username already exists!";
                } else {
                    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
                    if (mysqli_query($conn, $query)) {
                        echo "User added successfully!";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "Password must match!";
            }   
            exit();
        } else {
            echo "Invalid Request";
        }
    ?>