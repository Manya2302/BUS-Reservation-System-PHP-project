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
            background-color: #333;
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
<?php
session_start();
// Assuming the session variable 's_username' is set somewhere in the code.
// If it's not set, make sure to set it with the authenticated username.

// Establish a database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "bms";

// Create a connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Assuming you have the authenticated username value
$authenticatedUsername = 'admin';
$_SESSION['s_username'] = $authenticatedUsername;

// Retrieve user details from the database
// Retrieve user details from the database
$authenticatedUserID = 123; // Replace with the actual user ID

// Set the session variable 's_id'
$_SESSION['s_id'] = $authenticatedUserID;
$curr_user_id = $_SESSION['s_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "i", $curr_user_id);
mysqli_stmt_execute($stmt);
$select_users = mysqli_stmt_get_result($stmt);

// Check if the query was successful
if (!$select_users) {
    die("Query Failed: " . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($select_users)) {
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_phoneno = $row['user_phoneno'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
}

if (isset($_POST['update-user'])) {
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_phoneno = $_POST['user_phoneno'];
    $user_email = $_POST['user_email'];

    $image = $_FILES['images']['name'];
    $tmp_image = $_FILES['images']['tmp_name'];

    move_uploaded_file($tmp_image, "admin/images/$image");

    $query = "UPDATE users SET username=?,  password=?, firstname=?, lastname=?, phonenumber=?, email=?, image=? WHERE id=?";

    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssisi", $username, $user_password, $user_firstname, $user_lastname, $user_phoneno, $user_email, $image, $curr_user_id);
    $update_user = mysqli_stmt_execute($stmt);

    if (!$update_user) {
        die("Query Failed: " . mysqli_error($connection));
    }
    $_SESSION['s_image'] = $image;
    header("Location: profile.php");
}
?>
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
        <li class="sidebar-option"><a href="./ok/index.html"><i class="fa fa-fw fa-desktop"></i> CRUD</a></li>
        <li class="sidebar-option"><a href="comments.php"><i class="fa fa-fw fa-wrench"></i> Comments</a></li>
        <li class="sidebar-option"><a href="/bus-CU/Customer/admin/reservation.php"><i class="fa fa-fw fa-wrench"></i> Payment</a></li>
        <li class="sidebar-option"><a href="./profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a></li>
        <li class="sidebar-option"><a href="./report.php"><i class="fa fa-fw fa-book"></i> Reports</a></li>
        <li class="sidebar-option"><a href="./charts/html/index.html"><i class="fa fa-fw fa-book"></i> Charts</a></li>
        <li class="sidebar-option"><a href="./profile.php"><i class="fa fa-fw fa-dashboard"></i> Notes</a></li>
        <!-- New Option -->
        <li class="sidebar-option"><a href="#"><i class="fa fa-fw fa-cog"></i> New Option</a></li>
    </ul>
</div>

<div class="content">
    <div class="container" style="width: 50%;">
        <?php
        // Assuming you have the authenticated user ID value
        $authenticatedUserID = 123; // Replace with the actual user ID

        // Set the session variable 's_id'
        $_SESSION['s_id'] = $authenticatedUserID;

        // Retrieve user details from the database
        $curr_user_id = $_SESSION['s_id'];
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $curr_user_id);
        mysqli_stmt_execute($stmt);
        $select_users = mysqli_stmt_get_result($stmt);

        // Check if the query was successful
        if (!$select_users) {
            die("Query Failed: " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_users)) {
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_phoneno = $row['user_phoneno'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
        }

        // Check if 'user_image' is not empty before setting the session variable 's_image'
        if (!empty($user_image)) {
            $_SESSION['s_image'] = $user_image;
        }
        ?>
        <h2 style="text-align: center;">Profile</h2>
        <div style="margin-left: 32%; margin-bottom: 50px;">
            <img src="admin/images/<?php echo $user_image; ?>" width="200" class="img-circle" alt="Profile">
        </div>

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Personal Details')">Personal Details</button>
            <button class="tablinks" onclick="openCity(event, 'Tickets Booked')">Tickets Booked</button>
            <button class="tablinks" onclick="openCity(event, 'Edit Details')">Edit Details</button>
        </div>
        <div id="Personal Details" class="tabcontent">
            <h3>Details</h3>

            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><b>Username:</b></td>
                    <td><?php echo isset($username) ? ucfirst($username) : 'admin'; ?></td>
                </tr>
                <tr>
                    <td><b>First Name:</b></td>
                    <td><?php echo isset($user_firstname) ? ucfirst($user_firstname) : 'manya'; ?></td>
                </tr>
                <tr>
                    <td><b>Last Name:</b></td>
                    <td><?php echo isset($user_lastname) ? ucfirst($user_lastname) : 'parikh'; ?></td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td><?php echo isset($user_email) ? $user_email : 'ok@gmail.com'; ?></td>
                </tr>
                <tr>
                    <td><b>Phone No:</b></td>
                    <td><?php echo isset($user_phoneno) ? $user_phoneno : '1234567890'; ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div id="Tickets Booked" class="tabcontent">
            <h3>Tickets Booked</h3>
            <h3>Past Bookings:</h3>
            <?php
            $query = "SELECT * FROM orders INNER JOIN posts ON orders.bus_id = posts.post_id WHERE orders.user_id = ? AND DATE(posts.post_date) < CURDATE()";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $curr_user_id);
            mysqli_stmt_execute($stmt);
            $select_user_orders = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($select_user_orders)) {
                $passenger = $row['user_name'];
                $passenger_age = $row['user_age'];
                $source = $row['source'];
                $destination = $row['destination'];
                $dob = $row['date'];
                $cost = $row['cost'];
                $orderid = $row['order_id'];
                $busid = $row['bus_id'];
                $busdate = $row['post_date'];
                ?>

                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td><b>Passenger Name:</b></td>
                        <td><?php echo $passenger; ?></td>
                    </tr>
                    <tr>
                        <td><b>Passenger Age:</b></td>
                        <td><?php echo $passenger_age; ?></td>
                    </tr>
                    <tr>
                        <td><b>Source:</b></td>
                        <td><?php echo ucfirst($source); ?></td>
                    </tr>
                    <tr>
                        <td><b>Destination:</b></td>
                        <td><?php echo ucfirst($destination); ?></td>
                    </tr>
                    <tr>
                        <td><b>Date Of Booking:</b></td>
                        <td><?php echo $dob; ?></td>
                    </tr>
                    <tr>
                        <td><b>Cost:</b></td>
                        <td><?php echo $cost; ?></td>
                    </tr>
                    <tr>
                        <td><b>Print Receipt:</b></td>
                        <td><a href="receipt.php?orderid=<?php echo $orderid ?>">Receipt</a></td>
                    </tr>
                    </tbody>
                </table>
                <?php
            } ?>

            <h3>Upcoming Travels:</h3>
            <?php
            $query = "SELECT * FROM orders INNER JOIN posts ON orders.bus_id = posts.post_id WHERE orders.user_id = ? AND DATE(posts.post_date) >= CURDATE()";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $curr_user_id);
            mysqli_stmt_execute($stmt);
            $select_user_orders = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($select_user_orders)) {
                $passenger = $row['user_name'];
                $passenger_age = $row['user_age'];
                $source = $row['source'];
                $destination = $row['destination'];
                $dob = $row['date'];
                $cost = $row['cost'];
                $orderid = $row['order_id'];
                $busid = $row['bus_id'];
                $busdate = $row['post_date'];
                ?>

                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td><b>Passenger Name:</b></td>
                        <td><?php echo $passenger; ?></td>
                    </tr>
                    <tr>
                        <td><b>Passenger Age:</b></td>
                        <td><?php echo $passenger_age; ?></td>
                    </tr>
                    <tr>
                        <td><b>Source:</b></td>
                        <td><?php echo ucfirst($source); ?></td>
                    </tr>
                    <tr>
                        <td><b>Destination:</b></td>
                        <td><?php echo ucfirst($destination); ?></td>
                    </tr>
                    <tr>
                        <td><b>Date Of Journey:</b></td>
                        <td><?php echo $dob; ?></td>
                    </tr>
                    <tr>
                        <td><b>Cost:</b></td>
                        <td><?php echo $cost; ?></td>
                    </tr>
                    <tr>
                        <td><b>Print Ticket:</b></td>
                        <td><a href="ticket.php?orderid=<?php echo $orderid ?>">Ticket</a></td>
                    </tr>
                    </tbody>
                </table>
                <?php
            } ?>
        </div>

        <div id="Edit Details" class="tabcontent">
            <h3>Edit Details</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" class="form-control" name="user_password" value="<?php echo isset($user_password) ? $user_password : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="user_firstname">First Name</label>
                    <input type="text" class="form-control" name="user_firstname" value="<?php echo isset($user_firstname) ? $user_firstname : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="user_lastname">Last Name</label>
                    <input type="text" class="form-control" name="user_lastname" value="<?php echo isset($user_lastname) ? $user_lastname : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="user_phoneno">Phone No</label>
                    <input type="text" class="form-control" name="user_phoneno" value="<?php echo isset($user_phoneno) ? $user_phoneno : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="email" class="form-control" name="user_email" value="<?php echo isset($user_email) ? $user_email : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="images">Profile Picture</label>
                    <input type="file" name="images">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="update-user" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add necessary JavaScript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Open the "Edit Details" tab by default if the ID is 8
    <?php if($curr_user_id == 8): ?>
    document.getElementById("Edit Details").style.display = "block";
    <?php endif; ?>
</script>

</body>
</html>
