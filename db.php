<?php
// db.php
$host = 'localhost';
$username = 'astraea';
$password = 'Catunao@01';
$database = 'book_crud';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
