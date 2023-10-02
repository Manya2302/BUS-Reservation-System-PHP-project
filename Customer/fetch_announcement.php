<?php
// Configuration for your database
$dbHost = 'localhost'; // Replace with your database host
$dbName = 'bms'; // Replace with your database name
$dbUser = 'root'; // Replace with your database username
$dbPass = ''; // Replace with your database password

// Establish a database connection
$connection = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);

// Query to fetch the announcement details from the database
$query = $connection->query("SELECT * FROM announcements ORDER BY id DESC LIMIT 1");
$announcement = $query->fetch(PDO::FETCH_ASSOC);

// Send the announcement details as JSON response
header('Content-Type: application/json');
echo json_encode($announcement);
?>
