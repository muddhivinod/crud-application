<?php
include('../includes/db.php');
session_start();
if (!isset($_SESSION['userid'])) {
    die("Unauthorized");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    echo "Post created successfully.";
}
?>

<form method="post">
    Title: <input type="text" name="title" required><br>
    Content:<br>
    <textarea name="content" rows="4" cols="50" required></textarea><br>
    <input type="submit" value="Create Post">
</form>
