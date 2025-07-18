<?php
include('../includes/db_connect.php');

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
    <title>Assign Medicine to Checkup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Assign Medicine to Checkup</h2>
        <form action="save_prescription.php" method="POST" class="p-4 shadow bg-white rounded">
            <div class="mb-3">
                <label for="checkup_id" class="form-label">Select Checkup:</label>
                <select name="checkup_id" class="form-select" required>
                    <option value="">-- Select Checkup --</option>
                    <?php while ($row = mysqli_fetch_assoc($checkups)) { ?>
                        <option value="<?= $row['id'] ?>">Checkup #<?= $row['id'] ?> (<?= $row['date'] ?>)</option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="medicine_id" class="form-label">Select Medicine:</label>
                <select name="medicine_id" class="form-select" required>
                    <option value="">-- Select Medicine --</option>
                    <?php while ($row = mysqli_fetch_assoc($medicines)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" name="quantity" class="form-control" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Assign Medicine</button>
        </form>
    </div>
</body>
</html>
