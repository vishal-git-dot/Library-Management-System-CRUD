<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$date = date("Y-m-d");

$conn->query("UPDATE books 
              SET status='Issued', issue_date='$date' 
              WHERE id=$id");

header("Location: index.php");
?>
