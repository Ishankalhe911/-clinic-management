<?php include '../session.php';
$conn = new mysqli("localhost", "root", "", "clinic");

$today = date('Y-m-d');
if ($_SESSION['role'] == 'receptionist') {
  $result = $conn->query("SELECT * FROM appointments WHERE appointment_date >= '$today'");
} else {
  // patient view
  $result = $conn->query("SELECT * FROM appointments WHERE appointment_date >= '$today' AND patient_id='$_SESSION[patient_id]'");
}

while ($row = $result->fetch_assoc()) {
  echo "{$row['doctor_name']} on {$row['appointment_date']} at {$row['appointment_time']} [Status: {$row['status']}]";
}
?>
