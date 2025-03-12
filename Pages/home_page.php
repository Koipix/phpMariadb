<?php require "session_handler.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Hi, <?php echo htmlspecialchars($_SESSION['user']); ?> <3</h1>
    <a href="/api/logout.php">Logout</a>
</body>
<style>
    /* lazy frontend */
    * {
        margin: 0;
        padding: 0;
    }
</style>
</html>