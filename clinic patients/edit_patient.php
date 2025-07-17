<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "UPDATE patients SET name='$name', gender='$gender', age=$age, contact='$contact', address='$address' WHERE id=$id";
    $conn->query($sql);
    echo "Updated successfully.";
}

$patient = $conn->query("SELECT * FROM patients WHERE id=$id")->fetch_assoc();
?>

<h2>Edit Patient</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= $patient['name'] ?>" required><br>
    Gender:
    <select name="gender">
        <option <?= $patient['gender']=='Male'?'selected':'' ?>>Male</option>
        <option <?= $patient['gender']=='Female'?'selected':'' ?>>Female</option>
        <option <?= $patient['gender']=='Other'?'selected':'' ?>>Other</option>
    </select><br>
    Age: <input type="number" name="age" value="<?= $patient['age'] ?>" required><br>
    Contact: <input type="text" name="contact" value="<?= $patient['contact'] ?>"><br>
    Address: <textarea name="address"><?= $patient['address'] ?></textarea><br>
    <input type="submit" value="Update">
</form>
