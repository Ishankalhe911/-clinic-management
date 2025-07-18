<?php
include 'db_connect.php';

// मेडिसिन लिस्ट घेण्यासाठी
$medicines_sql = "SELECT medicine_id, name FROM medicines ORDER BY name ASC";
$medicines_result = $conn->query($medicines_sql);
?>

<!DOCTYPE html>
<html>
<head><title>Allocate Medicine</title></head>
<body>
<h2>Allocate Medicine to Prescription</h2>
<form method="POST" action="allocate_medicine.php">
  Prescription ID: <input type="number" name="prescription_id" required><br><br>

  Medicine: 
  <select name="medicine_id" required>
    <option value="">Select Medicine</option>
    <?php
    if ($medicines_result->num_rows > 0) {
      while($medicine = $medicines_result->fetch_assoc()) {
        echo "<option value='".$medicine['medicine_id']."'>".$medicine['name']."</option>";
      }
    }
    ?>
  </select><br><br>

  Quantity: <input type="number" name="quantity" min="1" required><br><br>

  <input type="submit" value="Allocate Medicine">
</form>
</body>
</html>
