<?php
include "../session.php";
include "../config/database.php";

$id = $_GET['id'];
$book = $conn->query("SELECT * FROM books WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $stmt = $conn->prepare(
        "UPDATE books SET title=?, author=?, year=? WHERE id=?"
    );
    $stmt->bind_param("ssii", $_POST['title'], $_POST['author'], $_POST['year'], $id);
    $stmt->execute();
    header("Location: index.php");
}
?>

<form method="POST">
    <input name="title" value="<?= $book['title'] ?>">
    <input name="author" value="<?= $book['author'] ?>">
    <input name="year" value="<?= $book['year'] ?>">
    <button name="update">Update</button>
</form>
