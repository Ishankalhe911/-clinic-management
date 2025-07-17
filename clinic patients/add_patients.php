<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "clinic_db");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO patients (name, gender, age, contact, address) 
            VALUES ('$name', '$gender', $age, '$contact', '$address')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "✅ Patient added successfully!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f8fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        form input[type="text"],
        form input[type="number"],
        form textarea,
        form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .message {
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Patient</h2>

    <?php if (isset($message)): ?>
        <div class="message <?php echo strpos($message, '✅') !== false ? 'success' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        Name:
        <input type="text" name="name" required>

        Gender:
        <select name="gender" required>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>

        Age:
        <input type="number" name="age" required>

        Contact:
        <input type="text" name="contact">

        Address:
        <textarea name="address"></textarea>

        <input type="submit" value="Add Patient">
    </form>
</div>

</body>
</html>
