<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
$id = $_GET['id'];
$conn->query("DELETE FROM patients WHERE id=$id");
header("Location: view_patients.php");
?>
