<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "clinic_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch medicines
$sql = "SELECT * FROM medicines ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Medicines</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f0f0f0; }
        table { border-collapse: collapse; width: 100%; background: white; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #007bff; color: white; }
        h2 { color: #333; }
    </style>
</head>
<body>

<h2>Medicine Inventory</h2>

<?php if ($result->num_rows > 0): ?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price (₹)</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["name"] ?></td>
        <td><?= $row["category"] ?></td>
        <td><?= $row["quantity"] ?></td>
        <td><?= $row["price"] ?></td>
        <td><?= $row["created_at"] ?></td>
        <td>
            <a href="edit_medicine.php?id=<?= $row["id"] ?>">Edit</a> |
            <a href="delete_medicine.php?id=<?= $row["id"] ?>" onclick="return confirm('Are you sure you want to delete this medicine?');">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php else: ?>
    <p>No medicines found.</p>
<?php endif; ?>

</body>
</html>
