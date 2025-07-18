<?php
include 'db_connect.php';

$sql = "SELECT * FROM prescriptions ORDER BY date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head><title>Prescriptions</title></head>
<body>
<h2>Prescriptions List</h2>
<table border="1">
<tr>
  <th>ID</th>
  <th>Patient ID</th>
  <th>Doctor ID</th>
  <th>Date</th>
  <th>Details</th>
</tr>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['prescription_id']."</td>
                <td>".$row['patient_id']."</td>
                <td>".$row['doctor_id']."</td>
                <td>".$row['date']."</td>
                <td>".$row['details']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No prescriptions found</td></tr>";
}
?>
</table>
</body>
</html>
