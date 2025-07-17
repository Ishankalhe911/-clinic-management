<?php
include '../session.php';
$conn = new mysqli("localhost", "root", "", "clinic");
$id = $_GET['id'];
$conn->query("UPDATE appointments SET status='Cancelled' WHERE id=$id");
echo "Cancelled!";
?>
