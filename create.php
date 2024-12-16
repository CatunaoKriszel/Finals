<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];  // Add genre

    $sql = "INSERT INTO books (title, author, genre) VALUES ('$title', '$author', '$genre')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add New Book</h1>
    <form action="create.php" method="POST">
        <label for="title">Book Title:</label>
        <input type="text" name="title" id="title" required>
        
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" required>  <!-- Add genre input -->

        <button type="submit" class="btn submit-btn">Add Book</button>
    </form>
</body>
</html>
