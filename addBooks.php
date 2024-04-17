<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
</head>
<body>

<h2>Add New Book</h2>

<form action="addBookAction.php" method="post">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>
    <label>Author:</label><br>
    <input type="text" name="author" required><br><br>
    <label>Year:</label><br>
    <input type="number" name="year" required><br><br>
    <label>Genre:</label><br>
    <input type="text" name="genre" required><br><br>
    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>
    <input type="submit" value="Add Book">
</form>
<a href="index.php">Back to Main Page</a>
</body>
</html>
