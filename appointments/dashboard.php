<?php
include 'session.php';
if ($_SESSION['role'] == 'receptionist') {
    echo "<a href='appointments/book.php'>Book Appointments</a>";
    echo "<a href='appointments/view.php'>View Appointments</a>";
} else {
    echo "<a href='appointments/view.php'>My Appointments</a>";
}
?>
