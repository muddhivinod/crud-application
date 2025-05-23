<?php
include('../includes/db.php');
session_start();
if (!isset($_SESSION['userid'])) {
    die("Unauthorized");
}

$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    echo "Post updated successfully.";
} else {
    $stmt = $conn->prepare("SELECT title, content FROM posts WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($title, $content);
    $stmt->fetch();
?>

<form method="post">
    Title: <input type="text" name="title" value="<?php echo $title; ?>" required><br>
    Content:<br>
    <textarea name="content" rows="4" cols="50" required><?php echo $content; ?></textarea><br>
    <input type="submit" value="Update Post">
</form>

<?php } ?>
