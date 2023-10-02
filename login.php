<?php
session_start();

// Database connection
$servername = "localhost";
$usernam = "root";
$password = "";
$dbname = "bms";

$conn = mysqli_connect($servername, $usernam, $password, $dbname);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check user credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["role"] = $row["role"];
        $_SESSION["username"] = $username;

        // Redirect to respective pages based on the role
        switch ($row["role"]) {
            case "customer":
                header("Location:./Customer/index.php");
                break;
            case "admin":
                header("Location:Admin/TEST.html");
                break;
            case "driver":
                header("Location: driver.html");
                break;
        }
    } else {
        $error = "Invalid username or password.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        /* CSS styles for login page */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(90deg, #C7C5F4, #776BCC);   
        }   

        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 50px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .register-button {
  background-color:#8f35e3;
  color: white;
  border: none;
  padding: 10px 20px;
 margin-left:150px;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

.register-button:hover {
  background-color: #45a049;
}

.register-button:active {
  background-color: #3e883b;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p>$error</p>"; }   ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <br>
            <button class="register-button" value="Login">Login</button>

          
        </form>
        <br>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>
</html>


   