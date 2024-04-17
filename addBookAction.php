<?php
$host = 'db';
$username = 'root';
$password = 'lionPass';
$database = 'booksite';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$author = $_POST['author'];
$year = $_POST['year'];
$genre = $_POST['genre'];
$description = $_POST['description'];

$sql = "INSERT INTO books (title, author, publishing_year, genre, description) VALUES ('$title', '$author', $year, '$genre', '$description')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="index.php">Back to Main Page</a>