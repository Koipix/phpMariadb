<?php require "session_handler.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="content">
        <h1>Hi, <?php echo htmlspecialchars($_SESSION['user']); ?> <3</h1>
        <a href="/api/logout.php">Logout</a>
    </div>
</body>
<style>
    /* lazy frontend */
    * {
        margin: 0;
        padding: 0;
    }

    .content {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>
</html>