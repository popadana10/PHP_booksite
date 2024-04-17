<?php
$host = 'db';
$username = 'root';
$password = 'lionPass';
$database = 'booksite';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$books = [];
if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM books WHERE title LIKE '%$searchTerm%' OR author LIKE '%$searchTerm%'";
} else {
    $sql = "SELECT * FROM books";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $books = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No books found";
}

$conn->close();
?>

<form method="get" action="editBooks.php">
    <label for="search">Search Book:</label>
    <input type="text" id="search" name="search">
    <input type="submit" value="Search">
</form>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?php foreach ($books as $book) : ?>
        <tr>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td><?php echo $book['genre']; ?></td>
            <td><?php echo $book['description']; ?></td>
            <td>
                <a href="editBookForm.php?id=<?php echo $book['id']; ?>">Edit</a> |
                <a href="deleteBooks.php?id=<?php echo $book['id']; ?>" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="index.php">Back to Main Page</a>
