<?php include '../session.php'; $conn = new mysqli("localhost", "root", "", "clinic");
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM appointments WHERE id=$id")->fetch_assoc();
?>

<form method="POST">
  New Date: <input type="date" name="date" value="<?= $row['appointment_date'] ?>"><br>
  New Time: <input type="time" name="time" value="<?= $row['appointment_time'] ?>"><br>
  <input type="submit" value="Update">
</form>

<?php
if ($_POST) {
  $conn->query("UPDATE appointments SET appointment_date='$_POST[date]', appointment_time='$_POST[time]', status='Rescheduled' WHERE id=$id");
  echo "Appointment Updated";
}
?>
