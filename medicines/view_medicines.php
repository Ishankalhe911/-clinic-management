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
        body { font-family: Arial; background: #f9f9f9; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin: auto; background: white; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background-color: #4CAF50; color: white; }
        h2 { text-align: center; }
        body {
    font-family: Arial;
    background: #add8e6; /* Light Blue background */
    padding: 20px;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin: auto;
    background: white;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

th {
    background-color: #4CAF50;
    color: white;
}

h2 {
    text-align: center;
}
 body {
        font-family: 'Orbitron', sans-serif;
        background-color:rgb(152, 215, 241);
        color: #fff;
        padding: 40px;
    }

    h2 {
        text-align: center;
        color:rgb(0, 0, 0);
        text-shadow: 0 0 5px #00ffe1;
        margin-bottom: 30px;
    }

    table {
        width: 90%;
        margin: auto;
        border-collapse: collapse;
        background: #1a1a1a;
        box-shadow: 0 0 15px #00ffe1;
        border-radius: 12px;
        overflow: hidden;
    }

    th, td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #333;
        transition: background 0.3s;
    }

    th {
        background: #222;
        color: #00ffe1;
        font-size: 18px;
        border-bottom: 2px solid #00ffe1;
    }

    td {
        color: #f0f0f0;
    }

    tr:hover {
        background:rgb(219, 169, 156);
    }

    a {
        color: #00ffe1;
        text-decoration: none;
        transition: 0.3s;
    }

    a:hover {
        color: #ff00d4;
        text-shadow: 0 0 5px #ff00d4;
    }
    </style>
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
