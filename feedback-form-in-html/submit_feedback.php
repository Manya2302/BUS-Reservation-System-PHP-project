<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ratings from the form
    $rating1 = $_POST["rating1"];
    $rating2 = $_POST["rating2"];
    $rating3 = $_POST["rating"];
    $commentText = $_POST["commentText"];

    // Other form fields can be retrieved in a similar manner

    // TODO: Validate and sanitize the input if necessary

    // Connect to the database (replace 'dbname', 'username', 'password' with your actual database credentials)
    $conn = new PDO("mysql:host=localhost;dbname=bms", "root", "");

    // Prepare the SQL statement to insert the ratings and suggestion into the database table
    $stmt = $conn->prepare("INSERT INTO feedback (rating1, rating2, rating3, commentText) VALUES (:rating1, :rating2, :rating3, :commentText)");

    // Bind the parameters with the retrieved values
    $stmt->bindParam(':rating1', $rating1);
    $stmt->bindParam(':rating2', $rating2);
    $stmt->bindParam(':rating3', $rating3);
    $stmt->bindParam(':commentText', $commentText);

    // Execute the SQL statement
    $stmt->execute();

    // Close the database connection
    $conn = null;

    // Redirect the user to a thank you page or display a success message
    header("Location: thank_you.html");
    exit();
}
?>
