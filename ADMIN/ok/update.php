<?php
// Establish a connection to the database
$connection = mysqli_connect("localhost", "root", "", "bms");

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Retrieve data from a form or any other source
$username = $_POST['username'];
$newPassword = $_POST['new_password'];

// Update the record in the database
$query = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Record updated successfully.";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
