<?php 
    require "session_handler.php"; 
    require "connect_sql.php";

    $sql = "SELECT * FROM post_data ORDER BY created_at DESC";
    $result = $conn->query($sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>   
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg bg-body-tertiary p-4 bg-light d-flex justify-content-between">
        <p class="pt-3 fs-5 fw-bold">Hi, <?php echo htmlspecialchars($_SESSION['user']); ?> <3</p>
        <div class="">
            <button class="btn btn-secondary py-2 me-3 fs-5" data-bs-toggle="modal" data-bs-target="#addPostModal"><i class="bi bi-plus-lg"></i></button>
            <a href="/api/logout.php" class="btn btn-primary">Logout</a>       
        </div>
    </nav>

    <div class="d-flex align-items-center justify-content-center">
        <div class="main w-75">
            <div class="container mt-4">
                <h2 class="text-center">Forum Board</h2>
                <?php if ($result->num_rows > 0): ?>
                    <ul class="list-group">
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <li class="list-group-item">
                                <h5><?= htmlspecialchars($row['title']) ?></h5>
                                <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                                <div>
                                    <small class="text-muted">Posted on <?= $row['created_at'] ?></small>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>No posts found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostLabel">New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/api/create_post.php" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end"> 
                            <button type="submit" class="btn btn-success">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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