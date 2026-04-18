<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Library Management System</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Search by title or author">
    <button type="submit">Search</button>
</form>

<a href="add.php">Add Book</a>

<table>
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM books 
        WHERE title LIKE '%$search%' 
        OR author LIKE '%$search%'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['title']}</td>
        <td>{$row['author']}</td>
        <td>{$row['status']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Edit</a>
            <a href='delete.php?id={$row['id']}'>Delete</a>
            <a href='issue.php?id={$row['id']}'>Issue</a>
            <a href='return.php?id={$row['id']}'>Return</a>
        </td>
    </tr>";
}
?>

</table>

</body>
</html>
