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
    ?>
<body>
    <div class="form">
        <form method="post">
            <h1>Signup Form</h1>
            <p>Status: <?php echo $status ?></p> <br>
            <label">Username</label> <br>
            <input type="text" id="user" name="user"> <br><br>
            <label>Passsword</label> <br>
            <input type="text" id="pass" name="pass"><br><br>
            <input type="submit" id="btn" value="Register" name="submit">
        </form> 
        <br>
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