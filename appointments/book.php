<?php
include 'datafunction.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['patient_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor = $_POST['doctor'];

    mysqli_query($conn, "INSERT INTO appointments (patient_name, date_a, time_a, doctor) VALUES ('$name', '$date', '$time', '$doctor')");
    echo "<script>
        alert('Appointment booked successfully!');
        window.location.href = 'index.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Book Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #d3cce3, #e9e4f0);">

    <div class="container mt-5">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-primary text-white text-center fs-4">Book New Appointment</div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Patient Name</label>
                        <input type="text" name="patient_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Time</label>
                        <input type="time" name="time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Doctor</label>
                        <input type="text" name="doctor" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Book Appointment</button>
                    <a href="login.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>