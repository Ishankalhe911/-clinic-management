<?php
include('../includes/db_connect.php');
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<div style='background-color: #d4edda; padding: 10px; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 10px;'>💊 Medicine assigned successfully!</div>";
}
?>


// Fetch checkups
$checkup_query = "SELECT id, date FROM checkups";
$checkups = mysqli_query($conn, $checkup_query);

// Fetch medicines
$medicine_query = "SELECT id, name FROM medicines";
$medicines = mysqli_query($conn, $medicine_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Medicine</title>
</head>
<body>
    <h2>Assign Medicine to Checkup</h2>

    <form action="save_prescription.php" method="POST">
        <label for="checkup_id">Select Checkup:</label>
        <select name="checkup_id" required>
            <option value="">-- Select --</option>
            <?php while($row = mysqli_fetch_assoc($checkups)) { ?>
                <option value="<?= $row['id'] ?>">Checkup #<?= $row['id'] ?> (<?= $row['date'] ?>)</option>
            <?php } ?>
        </select><br><br>

        <label for="medicine_id">Select Medicine:</label>
        <select name="medicine_id" required>
            <option value="">-- Select --</option>
            <?php while($row = mysqli_fetch_assoc($medicines)) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php } ?>
        </select><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br><br>

        <button type="submit">Assign Medicine</button>
    </form>
</body>
</html>

