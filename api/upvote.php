<?php
require "connect_sql.php";

if (isset($_GET['id'])) {
    $post_id = (int) $_GET['id'];
    
    $query = "UPDATE post_data SET react_count = react_count + 1 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();

    header("Location: /home");
    exit();
}
?>