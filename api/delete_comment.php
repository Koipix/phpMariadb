<?php
require "connect_sql.php";
    
if (isset($_GET['comment_id']) && isset($_GET['post_id'])) {
    $comment_id = (int) $_GET['comment_id'];
    $post_id = $_GET['post_id'];
    
    $query = "DELETE FROM comments WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();

    if ($stmt->execute()) {

            $updateQuery = "UPDATE post_data SET comment_count = comment_count - 1 WHERE id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("i", $post_id);
            $updateStmt->execute();
    }
    
    header("Location: /home/card/" . $post_id);
    exit();
}
?>