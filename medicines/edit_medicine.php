<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "clinic_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the URL
$id = $_GET["id"] ?? null;

if (!$id) {
    die("❌ Medicine ID not provided.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $update_sql = "UPDATE medicines SET 
                    name='$name', 
                    category='$category', 
                    quantity='$quantity', 
                    price='$price' 
                  WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "✅ Medicine updated successfully.";
        echo '<br><a href="view_medicines.php">← Back to List</a>';
        exit;
    } else {
        echo "❌ Update failed: " . $conn->error;
    }
}

// Load existing data
$sql = "SELECT * FROM medicines WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    die("❌ Medicine not found.");
}

$medicine = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Medicine</title>
</head>
<body>
    <h2>Edit Medicine</h2>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= $medicine['name'] ?>" required><br><br>

        <label>Category:</label><br>
        <input type="text" name="category" value="<?= $medicine['category'] ?>" required><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="<?= $medicine['quantity'] ?>" required><br><br>

        <label>Price (₹):</label><br>
        <input type="number" step="0.01" name="price" value="<?= $medicine['price'] ?>" required><br><br>

        <button type="submit">Update Medicine</button>
    </form>
</body>
</html>
