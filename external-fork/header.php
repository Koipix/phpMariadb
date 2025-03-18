<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Header</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #bb3012;
            height: 60px;
            padding: 5px 0;
        }

        .container-fluid {
            display: flex;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        .navbar-brand {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 60px;
            max-height: 100%;
            width: auto;
            object-fit: contain;
        }

        .dropdown-menu {
            min-width: 150px;
            padding: 5px 0;
            border: 1px solid #ddd;
            background-color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="forum.php">
                <img src="logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="forum.php">Home</a></li>
                    <!-- <?php if (isset($_SESSION['username'])): ?> -->
                        <li class="nav-item"><a class="nav-link text-white" href="myposts.php">My Posts</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="add_post.php">➕ Add Post</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="" class="rounded-circle" height="30"> <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="account.php">My Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    <!-- <?php else: ?>
                        <li class="nav-item"><a class="nav-link text-white" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="register.php">Register</a></li>
                    <?php endif; ?> -->
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>