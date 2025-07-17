<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'clinic_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO patients (name, age, gender, contact)
            VALUES ('$name', '$age', '$gender', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Patient added successfully!</p>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add New Patient</h2>
<form method="POST" action="">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Age:</label><br>
    <input type="number" name="age" required><br><br>

    <label>Gender:</label><br>
    <select name="gender" required>
        <option value="">Select</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
    </select><br><br>

    <label>Contact:</label><br>
    <input type="text" name="contact" required><br><br>

    <button type="submit">Add Patient</button>
</form>
