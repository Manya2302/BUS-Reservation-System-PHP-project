<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['s_username'])) {
    header("Location: ../login.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    // Function to create a new driver in the database
    function createDriver($username, $password, $firstName, $lastName, $email, $phoneNumber, $gender, $age) {
        // Implement the necessary database connection and query execution based on your setup
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "bms";

        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the query
        $query = "INSERT INTO users (username, password, firstname, lastname, email, phonenumber, gender, age, role) VALUES (:username, :password, :firstName, :lastName, :email, :phoneNumber, :gender, :age, 'driver')";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':firstName', $firstName);
        $statement->bindParam(':lastName', $lastName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phoneNumber', $phoneNumber);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':age', $age);
        $statement->execute();

        // Close the database connection
        $pdo = null;
    }

    // Create the new driver
    createDriver($username, $password, $firstName, $lastName, $email, $phoneNumber, $gender, $age);

    // Redirect to the driver details page or any other desired page
    header("Location: driver_details.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Driver</title>
    <!-- Add necessary CSS and JavaScript libraries -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Custom CSS for the admin panel */
        body {
            padding-top: 70px;
        }
        
        .navbar-inverse .navbar-brand {
            color: #fff;
        }
        
        .navbar-inverse .navbar-nav > li > a {
            color: #fff;
        }
        
        .navbar-inverse .navbar-nav > li > a:hover,
        .navbar-inverse .navbar-nav > li > a:focus {
            background-color: #000;
        }
        
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Bus Ticket System Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="../index.php">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="content">
            <h2>Create Driver</h2>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

    <!-- Include necessary JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
