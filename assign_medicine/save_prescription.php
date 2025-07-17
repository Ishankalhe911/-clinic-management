<?php
include('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkup_id = $_POST['checkup_id'];
    $medicine_id = $_POST['medicine_id'];
    $quantity = $_POST['quantity'];

    // Validate inputs
    if (!empty($checkup_id) && !empty($medicine_id) && !empty($quantity)) {
        $sql = "INSERT INTO prescriptions (checkup_id, medicine_id, quantity)
                VALUES ('$checkup_id', '$medicine_id', '$quantity')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('💊 Medicine assigned successfully!'); window.location.href='assign_medicine.php';</script>";
        } else {
            echo "❌ Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
    }
} else {
    echo "Invalid request.";
}
?>
