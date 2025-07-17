<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $sql = "INSERT INTO medicines (name, category, quantity, price) 
            VALUES ('$name', '$category', '$quantity', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Medicine added successfully!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Medicine</title>
     <style>
        body {
            background-color: #d0ebff;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: white;
            width: 400px;
            padding: 30px;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        .form-container h2 {
            text-align: center;
            color: #0077b6;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            background-color: #0077b6;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .message {
            text-align: center;
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Add Medicine</h2>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Category:</label><br>
        <input type="text" name="category" required><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br><br>

        <label>Price (₹):</label><br>
        <input type="number" step="0.01" name="price" required><br><br>

        <button type="submit">Add Medicine</button>
    </form>
</body>
</html>
