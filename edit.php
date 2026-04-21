<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM books WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $conn->query("UPDATE books SET title='$title', author='$author' WHERE id=$id");
    header("Location: index.php");
}
?>

<form method="POST">
    <h2>Edit Book</h2>
    <input type="text" name="title" value="<?= $data['title'] ?>" required>
    <input type="text" name="author" value="<?= $data['author'] ?>" required>
    <button type="submit">Update</button>
</form>
