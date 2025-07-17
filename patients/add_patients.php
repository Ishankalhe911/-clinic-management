<?php
// Connection
$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO patients (name, gender, age, contact, address) 
            VALUES ('$name', '$gender', $age, '$contact', '$address')";
    $conn->query($sql);
    echo "Patient added successfully!";
}
?>

<h2>Add Patient</h2>
<form method="post">
    Name: <input type="text" name="name" required><br>
    Gender: 
    <select name="gender" required>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
    </select><br>
    Age: <input type="number" name="age" required><br>
    Contact: <input type="text" name="contact"><br>
    Address: <textarea name="address"></textarea><br>
    <input type="submit" value="Add Patient">
</form>
