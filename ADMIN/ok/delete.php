<?php
// Establish a connection to the database
$connection = mysqli_connect("localhost", "root", "", "bms");

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Select all records from the database
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);

// Process the retrieved data
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "username: " . $row['username'] . "<br>";
        echo "Password: " . $row['password'] . "<br>";
        echo "<br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
mysqli_close($connection);
?>
