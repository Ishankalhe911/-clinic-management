<?php
include 'db_connect.php';

$sql = "SELECT * FROM medicines ORDER BY name ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head><title>Medicines</title></head>
<body>
<h2>Medicines List</h2>
<table border="1">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Price</th>
  <th>Stock Quantity</th>
</tr>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['medicine_id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['price']."</td>
                <td>".$row['stock_quantity']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No medicines found</td></tr>";
}
?>
</table>
</body>
</html>
