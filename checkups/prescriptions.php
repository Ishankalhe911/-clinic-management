<?php
// Show all PHP errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to database
include '../includes/db_connect.php';

// Check if checkup_id is passed
if (!isset($_GET['checkup_id'])) {
    die("Missing checkup ID");
}

$checkup_id = $_GET['checkup_id'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $medicine_name = $_POST['medicine_name'];
    $dosage = $_POST['dosage'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO prescriptions (checkup_id, medicine_name, dosage, duration)
            VALUES ('$checkup_id', '$medicine_name', '$dosage', '$duration')";

    if (!mysqli_query($conn, $sql)) {
        die("Error inserting prescription: " . mysqli_error($conn));
    }
}

// Fetch prescriptions for the given checkup
$result = mysqli_query($conn, "SELECT * FROM prescriptions WHERE checkup_id = $checkup_id");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Prescriptions</title>
</head>
<body>
    <h2>Prescriptions for Checkup ID #<?= $checkup_id ?></h2>

    <form method="POST">
        <input type="text" name="medicine_name" placeholder="Medicine Name" required>
        <input type="text" name="dosage" placeholder="Dosage (e.g., 500mg)" required>
        <input type="text" name="duration" placeholder="Duration (e.g., 5 days)" required>
        <button type="submit">Add Prescription</button>
    </form>

    <h3>Prescribed Medicines</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Dosage</th>
            <th>Duration</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['medicine_name'] ?></td>
                <td><?= $row['dosage'] ?></td>
                <td><?= $row['duration'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
