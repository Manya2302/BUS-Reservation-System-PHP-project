<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bms";

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered username and password
    $username = sanitize($_POST["username"]);
    $password = sanitize($_POST["password"]);

    // Prepare and execute the login query
    $stmt = $conn->prepare("SELECT * FROM drivers WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the login was successful
    if ($result->num_rows == 1) {
        // Fetch the driver's details from the query result
        $row = $result->fetch_assoc();
        $driverId = $row["id"];

        // Get the current date and time
        $currentDateTime = date('Y-m-d H:i:s');

        // Prepare and execute the attendance insertion query
        $stmt = $conn->prepare("INSERT INTO attendance (driver_id, date_time) VALUES (?, ?)");
        $stmt->bind_param("is", $driverId, $currentDateTime);
        $stmt->execute();

        // Redirect to a success page or perform any other desired action
        header("Location: success.php");
        exit();
    } else {
        // Invalid login credentials
        echo "Invalid username or password.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
