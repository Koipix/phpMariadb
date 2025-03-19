<?php
require "connect_sql.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $content = $_POST['content'];

    if (!empty($post_id) && !empty($content)) {
        $query = "INSERT INTO comments (post_id, content, created_at) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("is", $post_id, $content);

        if ($stmt->execute()) {
            // Update comment count
            $updateQuery = "UPDATE post_data SET comment_count = comment_count + 1 WHERE id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("i", $post_id);
            $updateStmt->execute();

            header("Location: /home/card/" . $post_id);
            exit();
        }
    }
}
?>

