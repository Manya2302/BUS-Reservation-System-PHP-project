<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['s_username'])) {
    header("Location: ../login.php");
    exit;
}

// Check if driver ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Get the driver ID from the URL parameter
$driverId = $_GET['id'];

// Function to delete a driver from the database
function deleteDriver($driverId) {
    // Implement the necessary database connection and query execution based on your setup
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "bms";

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the query
    $query = "DELETE FROM users WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $driverId);
    $statement->execute();

    // Close the database connection
    $pdo = null;
}

// Delete the driver
deleteDriver($driverId);

// Redirect back to the driver details page
header("Location: driver_details.php");
exit;
?>
