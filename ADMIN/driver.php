<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
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
        
        .side-nav {
            position: fixed;
            width: 250px;
            height: 100%;
            left: 0;
            top: 0;
            padding-top: 70px;
            background-color: #f8f8f8;
            overflow-y: auto;
        }
        
        /* Adjustments for desktop view */
        @media (min-width: 768px) {
            .side-nav {
                padding-top: 70px;
            }
        
            .content {
                margin-left: 250px;
                padding-top: 70px;
            }
        }
        
        /* Styles for headings */
        .sidebar-heading {
            font-size: 18px;
            font-weight: bold;
            padding: 10px 15px;
            color: #333;
            background-color: #f8f8f8;
            border-bottom: 1px solid #ddd;
        }
        
        /* Styles for options */
        .sidebar-option {
            padding: 10px 15px;
            background-color:  #333;
        }
        
        .sidebar-option a {
            color: #fff;
            text-decoration: none;
        }
        
        .sidebar-option a:hover {
            color: #ccc;
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

    <div class="side-nav">
        <ul class="nav">
            <li class="sidebar-option"><a href="TEST.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
            <li class="sidebar-option">
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Buses <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li><a href="showbus.php">All Buses</a></li>
                    <li><a href="buses.php?source=add_bus">Add Buses</a></li>
                </ul>
            </li>
      <li class="sidebar-option"><a href="comments.php"><i class="fa fa-fw fa-wrench"></i> Comments</a></li>
            <li class="sidebar-option"><a href="/bus-CU/Customer/admin/reservation.php"><i class="fa fa-fw fa-wrench"></i> Payment</a></li>
            <li class="sidebar-option"><a href="./report.php"><i class="fa fa-fw fa-book"></i> Reports</a></li>
            <li class="sidebar-option"><a href="./charts/html/index.php"><i class="fa fa-fw fa-book"></i> Charts</a></li>
            <li class="sidebar-option"><a href="./notes1.php"><i class="fa fa-fw fa-dashboard"></i> Announcement</a></li>
            <li class="sidebar-option"><a href="./users.php"><i class="fa fa-fw fa-cog"></i> USERS</a></li>
            <li class="sidebar-option"><a href="./driver.php"><i class="fa fa-fw fa-cog"></i> Driver</a></li>
            <li class="sidebar-option">
                <a href="javascript:;" data-toggle="collapse" data-target="#place-demo"><i class="fa fa-fw fa-arrows-v"></i> Places <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="place-demo" class="collapse">
    <li><a href="show place.php">All Places</a></li>
    <li><a href="add place.php">Add Places</a></li>
</ul>
            <li class="sidebar-option"><a href="./.php"></a></li>
            <li class="sidebar-option"><a href="./.php"> </a></li>
            <li class="sidebar-option"><a href="./.php"> </a></li>
        </ul>
    </div>

    <div class="content">
        <div class="container">
            <h2>Driver Details</h2>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

            <a href="create_driver.php" class="btn btn-primary">Create</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Function to retrieve driver details from the database
                function getDrivers() {
                    // Implement the necessary database connection and query execution based on your setup
                    $dbHost = "localhost";
                    $dbUser = "root";
                    $dbPass = "";
                    $dbName = "bms";

                    // Create a new PDO instance
                    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Prepare and execute the query
                    $query = "SELECT * FROM users WHERE role = 'driver'";
                    $statement = $pdo->prepare($query);
                    $statement->execute();

                    // Fetch all rows as an associative array
                    $drivers = $statement->fetchAll(PDO::FETCH_ASSOC);

                    // Close the database connection
                    $pdo = null;

                    return $drivers;
                }
                ?>
                <?php
                // Assuming you have access to the necessary data for driver details
                $drivers = getDrivers(); // Function to retrieve driver details from the database

                foreach ($drivers as $driver) {
                    echo "<tr>";
                    echo "<td>" . $driver['id'] . "</td>";
                    echo "<td>" . $driver['firstname'] . "</td>";
                    echo "<td>" . $driver['lastname'] . "</td>";
                    echo "<td>" . $driver['username'] . "</td>";
                    echo "<td>" . $driver['email'] . "</td>";
                    echo "<td>" . $driver['phonenumber'] . "</td>";
                    echo "<td>" . $driver['gender'] . "</td>";
                    echo "<td>" . $driver['age'] . "</td>";
                    echo "<td>" . $driver['role'] . "</td>";
                    echo '<td>
                            <a href="edit_driver.php?id=' . $driver['id'] . '" class="btn btn-primary">Edit</a>
                            <a href="delete_driver.php?id=' . $driver['id'] . '" class="btn btn-danger">Delete</a>
                          </td>';
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include necessary JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
