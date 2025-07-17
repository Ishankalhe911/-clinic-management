<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
$result = $conn->query("SELECT * FROM patients");
?>

<h2>All Patients</h2>
<table border="1">
    <tr><th>ID</th><th>Name</th><th>Gender</th><th>Age</th><th>Contact</th><th>Address</th><th>Actions</th></tr>
    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['contact'] ?></td>
            <td><?= $row['address'] ?></td>
            <td>
                <a href="edit_patient.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete_patient.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this patient?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
