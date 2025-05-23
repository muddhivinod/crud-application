<?php
include('../includes/db.php');
session_start();
if (!isset($_SESSION['userid'])) {
    die("Unauthorized");
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
echo "Post deleted successfully.";
?>
