<?php
include 'datafunction.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM appointments WHERE id=$id");
header("Location: view.php");
exit;
