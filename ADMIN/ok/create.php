<?php
// Establish a connection to the database
$connection = mysqli_connect("localhost", "root", "", "bms");

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Retrieve data from a form or any other source
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Insert the data into the database
$query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Record created successfully.";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
