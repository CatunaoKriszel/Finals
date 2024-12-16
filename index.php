<?php
include 'db.php';

// Fetch all books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Book Management</h1>
    <a href="create.php" class="btn">Add New Book</a>
    
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>  <!-- Add Genre Column -->
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['title']; ?></td>
            <td><?= $row['author']; ?></td>
            <td><?= $row['genre']; ?></td>  <!-- Display Genre -->
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn edit-btn">Edit</a>
                <a href="delete.php?id=<?= $row['id']; ?>" class="btn delete-btn">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
