<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the driver ID is 1
$driverId = 1;

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Insert the attendance into the database
$insertQuery = "INSERT INTO attendance (driver_id, date_time) VALUES ($driverId, '$currentDateTime')";
$conn->query($insertQuery);

// Retrieve the driver's shift information
$shiftQuery = "SELECT * FROM shifts WHERE driver_id = $driverId";
$result = $conn->query($shiftQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $shiftStartDate = $row['start_date'];
    $shiftEndDate = $row['end_date'];
    $shift = $row['shift'];

    // Display the success message and shift information
    echo "<h3>Attendance recorded successfully.</h3><br>";
    echo "Your shift: $shift<br>";
    echo "Shift Start Date: $shiftStartDate<br>";
    echo "Shift End Date: $shiftEndDate<br>";
} else {
    echo "No shift information found for the driver.";
}

// Close the database connection
$conn->close();
?>
