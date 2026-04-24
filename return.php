<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];

$data = $conn->query("SELECT * FROM books WHERE id=$id")->fetch_assoc();

$issue_date = strtotime($data['issue_date']);
$return_date = strtotime(date("Y-m-d"));

$days = ($return_date - $issue_date) / (60 * 60 * 24);

$fine = 0;
if ($days > 7) {
    $fine = ($days - 7) * 2; // ₹2 per extra day
}

$conn->query("UPDATE books 
              SET status='Available', issue_date=NULL 
              WHERE id=$id");

echo "<h2>Book Returned</h2>";
echo "<p>Days: $days</p>";
echo "<p>Fine: ₹$fine</p>";
echo "<a href='index.php'>Back</a>";
?>
