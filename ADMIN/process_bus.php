<?php
// Retrieve form data
$category_id = $_POST['category_id'];
$title = $_POST['title'];
$author = $_POST['author'];
$date = $_POST['date'];
$image = $_FILES['image']['name'];
$content = $_POST['content'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$via = $_POST['via'];
$via_time = $_POST['via_time'];
$max_seats = $_POST['max_seats'];
$available_seats = $_POST['available_seats'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database table
$sql = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_source, post_destination, post_via, post_via_time, max_seats, available_seats)
        VALUES ('$category_id', '$title', '$author', '$date', '$image', '$content', '$source', '$destination', '$via', '$via_time', '$max_seats', '$available_seats')";

if ($conn->query($sql) === TRUE) {
    echo "Bus added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
