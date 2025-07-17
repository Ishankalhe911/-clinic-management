<?php
include 'datafunction.php';
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $passwords = $_POST['passwords'];
    $query = "SELECT * FROM Receptionist WHERE username='$username' AND passwords='$passwords' ";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
?>
        <?php
        include 'datafunction.php';

        $result = mysqli_query($conn, "SELECT * FROM appointments");
        ?>

        <table border="1">
            <link href="tableres.css" rel="stylesheet">
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['patient_name'] ?></td>
                    <td><?= $row['doctor'] ?></td>
                    <td><?= $row['date_a'] ?></td>
                    <td><?= $row['time_a'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a>
                    </td>
                </tr>
    <?php }
        } else {
            echo "<b>invalid username or password</b>";
        }
    }
    ?>
        </table>