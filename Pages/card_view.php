<?php 
    require "session_handler.php"; 
    require "connect_sql.php";

    $id = $_GET['id'];
    $query = "SELECT * FROM post_data WHERE id='$id'";
    $resultId = $conn->query($query);
    $row = $resultId->fetch_assoc();
    $post_id = $row['id'];

    $comment_query = "SELECT * FROM comments WHERE post_id = ?";
    $stmt = $conn->prepare($comment_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
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
<body class="d-flex flex-column min-vh-100 bg-darkblue">

    <nav class="navbar navbar-expand-lg p-4 bg-darkblue">
        <div class="container d-flex justify-content-between align-items-center">
            <p class="fs-5 fw-bold text-id mb-0">Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
            <div class="d-flex align-items-center gap-3">     
                <a href="/api/logout.php" class="btn rounded-5 d-flex align-items-center px-3 py-2 h-100 text-light fw-medium">
                    Logout
                </a>       
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center custom-container gap-2">
        <div class="main w-75 d-flex justify-content-md-between">
            <div class="d-flex flex-column container justify-content-center gap-3">
                    <ul class="d-flex flex-column gap-3 align-items-center w-100 p-0">
                            <li class="card bg-container border-container py-3 px-4 rounded-4 min-container w-100">
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="text-id fw-semibold fs-xsm">#<?= $row['id'] ?></p>
                                    <small class="text-container">Posted on <?= $row['created_at'] ?></small>
                                </div>
                                <h5 class="text-container fw-normal"><?= htmlspecialchars($row['title']) ?></h5>
                                <p class="text-container fw-light"><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                                <div class="flex border-custom-top pt-3">
                                    <div class="d-inline-flex font-subtle align-items-center">
                                        <div class="me-4 fs-5 d-inline-flex align-items-center">
                                            <a href="" class="d-inline-flex align-items-center text-decoration-none">
                                                <i class="bi bi-arrow-up font-subtle upvote"></i>
                                                <p class="mb-0 ms-1 font-subtle"><?= $row['react_count'] ?></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    </ul>

                <div class="d-flex flex-column w-100">
                    <div class="card bg-container border-container py-3 px-4 rounded-4 min-container">
                            <div class="d-inline-flex justify-content-between align-items-center mb-3">
                                <h3 class="text-id fs-4">Comment Section</h3>
                                <button class="btn btn-red-custom btn-hover text-light fs-5 rounded-5 d-flex align-items-center px-3 py-2 h-100" data-bs-toggle="modal" data-bs-target="#addCommentModal">
                                    <i class="bi bi-plus-lg fw-medium"></i>
                                    <span class="fs-6 ms-2 fw-medium">New</span>
                                </button> 
                            </div>
                            
                            <?php if ($result->num_rows > 0): ?>
                                <ul class="d-flex flex-column gap-3 w-100 p-0">
                                    <?php while ($comment = $result->fetch_assoc()): ?>
                                        <li class="list-unstyled mt-2 d-inline-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="fs-6 text-id mb-0"><?= htmlspecialchars($comment['content']) ?></p>
                                                <span class="fs-6 text-id"><?= $comment['created_at'] ?></span>                    
                                            </div>
                                            <div class="visible">
                                                <a href="/deleteComment/<?= $comment['id']; ?>/<?= $post_id ?>" class="fs-5 d-inline-flex align-items-center text-decoration-none">
                                                    <i class="bi bi-trash font-subtle fs-4 delete"></i>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php else: ?>
                                <p class="fs-6 text-id">No comments yet.</p>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-container border-container h-25 w-50 p-3 min-box rounded-3">
                <h3 class="text-id">Post anonymously!</h3>
        </div>
    </div>    

    <div class="modal fade" id="addCommentModal" tabindex="-1" aria-labelledby="addCommenttLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCommentLabel">New Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/api/create_comment.php" method="POST">
                        <input type="hidden" name="post_id" value="<?= $id?>">
                        <div class="mb-3">
                            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Add Comment</button>
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

    .main {
    min-width: 700px;
    width: 75%;
    }

    .container {
    min-width: 600px;
    width: 100%;
    }

    .content {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .bg-darkblue {
        background-color: #111827;
    }

    .bg-container {
        background-color: #161E2F;
    }

    .text-container {
        color: #94A3B8;
    }

    .border-container {
        border: #1E293B solid 1px;
    }

    .text-id {
        color: #94a2b9;
    }

    .fs-xsm {
        font-size: 0.9rem;
    }

    .font-subtle {
        color: #616d80;
    }

    .custom-container {
        margin: 20px auto 20px auto;
    }

    .border-custom-top {
        border-top: #1E293B 2px solid;
    }

    .min-box {
        min-width: 350px;
        min-height: 350px;
        max-width: 400px;
        max-height: 400px;
    }  
    
    .min-container {
        max-width: 900px;
    }

    .btn-red-custom {
        background-color: #C63C51;
    }

    .btn-hover:hover {
        background-color: #D95F59;
    }

    .upvote:hover, .comment:hover, .delete:hover{
        color: #C63C51;
    }
</style>