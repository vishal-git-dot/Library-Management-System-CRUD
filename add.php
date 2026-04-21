<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $conn->query("INSERT INTO books (title, author) VALUES ('$title', '$author')");
    header("Location: index.php");
}
?>

<form method="POST">
    <h2>Add Book</h2>
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <button type="submit">Add</button>
</form>
