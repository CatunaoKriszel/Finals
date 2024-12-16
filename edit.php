<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];  // Add genre

    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . $conn->error;
    }
}

if ($id) {
    $sql = "SELECT * FROM books WHERE id=$id";
    $result = $conn->query($sql);
    $book = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Book</h1>
    <form action="edit.php?id=<?= $id ?>" method="POST">
        <label for="title">Book Title:</label>
        <input type="text" name="title" id="title" value="<?= $book['title']; ?>" required>
        
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="<?= $book['author']; ?>" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="<?= $book['genre']; ?>" required>  <!-- Edit genre -->

        <button type="submit" class="btn submit-btn">Update Book</button>
    </form>
</body>
</html>
