<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
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
            $username = $_POST["user"];
            $password = $_POST["pass"];
            
            $check_query = "SELECT * FROM users WHERE username = '$username'";
            $check_query = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_query) > 0) {
                $_SESSION['message'] = "Username already exists!";
            } else {
                $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

                if (mysqli_query($conn, $query)) {
                    $_SESSION['message'] = "User added successfully!";
                } else {
                    $_SESSION['message'] = "Error: " . mysqli_error($conn);
                }
            }

            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
<body>
    <div class="form">
        <form method="post">
            <h1>Login Form</h1>
            <p>Status: <?php echo $status ?></p> <br>
            <label">Username</label> <br>
            <input type="text" id="user" name="user"> <br><br>
            <label>Passsword</label> <br>
            <input type="text" id="pass" name="pass"><br><br>
            <input type="submit" id="btn" value="Register" name="submit">
        </form> 
        <br>

        <!-- whatever is this abomination..-->
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

    </div>
</body>

<style>
    /* lazy frontend */
    * {
        margin: 0;
        padding: 0;
    }

    .form {
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form form {
    }
</style>
</html>