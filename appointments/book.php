<?php include '../session.php'; ?>
<form method="POST">
    Patient ID: <input name="patient_id"><br>
    Doctor: <input name="doctor_name"><br>
    Date: <input type="date" name="appointment_date"><br>
    Time: <input type="time" name="appointment_time"><br>
    <input type="submit" value="Book">
</form>

<?php
if ($_POST) {
  $conn = new mysqli("localhost", "root", "", "clinic");
  $sql = "INSERT INTO appointments 
          (patient_id, doctor_name, appointment_date, appointment_time, created_by)
          VALUES ('$_POST[patient_id]', '$_POST[doctor_name]', '$_POST[appointment_date]', '$_POST[appointment_time]', '$_SESSION[user_id]')";
  $conn->query($sql);
  echo "Appointment Booked!";
}
?>
