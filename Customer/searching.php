<?php
// Database configuration
$dbHost = 'localhost'; // Replace with your database host
$dbName = 'bms'; // Replace with your database name
$dbUser = 'root'; // Replace with your database username
$dbPass = ''; // Replace with your database password

// Establish a database connection
$connection = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);

// Get the origin and destination from the form
$origin = $_POST['origin_desc'];
$destination = $_POST['dest_destination'];

// Check if the bus schedule exists for the selected origin and destination
$query = $connection->prepare("SELECT * FROM posts WHERE post_source = :origin AND post_destination = :destination");
$query->bindParam(':origin', $origin);
$query->bindParam(':destination', $destination);
$query->execute();

// If the bus schedule exists, redirect to the accommodation page
if ($query->rowCount() > 0) {
    header('Location: http://localhost/bus-CU/Customer/accommodation.php');
    exit();
} else {
    // Debugging: Output the query and the form data for troubleshooting
    echo "Query: SELECT * FROM posts WHERE post_source = $origin AND post_destination = $destination<br>";
    echo "Form Data - Origin: $origin, Destination: $destination";
    exit();
}
?>
