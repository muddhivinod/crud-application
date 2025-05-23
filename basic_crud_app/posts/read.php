<?php
include('../includes/db.php');
$result = $conn->query("SELECT * FROM posts");

while($row = $result->fetch_assoc()) {
    echo "<h2>" . $row['title'] . "</h2>";
    echo "<p>" . $row['content'] . "</p>";
    echo "<a href='update.php?id=" . $row['id'] . "'>Edit</a> | ";
    echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a><hr>";
}
?>
