<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['s_username'])) {
    header("Location: ../login.php");
    exit;
}

// Check if customer ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Get the customer ID from the URL parameter
$customerId = $_GET['id'];

// Function to delete a customer from the database
function deleteCustomer($customerId) {
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
    $statement->bindParam(':id', $customerId);
    $statement->execute();

    // Close the database connection
    $pdo = null;
}

// Delete the customer
deleteCustomer($customerId);

// Redirect back to the customer details page
header("Location: customer_details.php");
exit;
?>
