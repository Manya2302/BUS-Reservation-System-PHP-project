<?php
ob_start(); // Start output buffering

session_start();

// Check if user is logged in
if (!isset($_SESSION['s_username'])) {
    header("Location: ../login.php");
    exit;
}
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
            padding-top: 20px;
            padding-left:10px;
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
        table {
      border-collapse: collapse;
      width: 100%;
    }

    table th, table td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    table th {
      background-color: #f2f2f2;
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
        </ul>
    </div>

    <div class="content">
    <h1>All Posts</h1>
  <?php
    // Replace with your database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bms";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all posts from the database
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr>";
      echo "<th>Post ID</th>";
      echo "<th>Post Category ID</th>";
      echo "<th>Post Title</th>";
      echo "<th>Post Author</th>";
      echo "<th>Post Date</th>";
      echo "<th>Post Image</th>";
      echo "<th>Post Content</th>";
      echo "<th>Post Source</th>";
      echo "<th>Post Destination</th>";
      echo "<th>Post Via</th>";
      echo "<th>Post Via Time</th>";
      echo "<th>Post Query Count</th>";
      echo "<th>Max Seats</th>";
      echo "<th>Available Seats</th>";
      echo "</tr>";

      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["post_id"] . "</td>";
        echo "<td>" . $row["post_category_id"] . "</td>";
        echo "<td>" . $row["post_title"] . "</td>";
        echo "<td>" . $row["post_author"] . "</td>";
        echo "<td>" . $row["post_date"] . "</td>";
        echo "<td>" . $row["post_image"] . "</td>";
        echo "<td>" . $row["post_content"] . "</td>";
        echo "<td>" . $row["post_source"] . "</td>";
        echo "<td>" . $row["post_destination"] . "</td>";
        echo "<td>" . $row["post_via"] . "</td>";
        echo "<td>" . $row["post_via_time"] . "</td>";
        echo "<td>" . $row["post_query_count"] . "</td>";
        echo "<td>" . $row["max_seats"] . "</td>";
        echo "<td>" . $row["available_seats"] . "</td>";
        echo "</tr>";
      }

      echo "</table>";
    } else {
      echo "No posts found.";
    }

    // Close the database connection
    $conn->close();
  ?>
  </div>

    <!-- Include necessary JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

  
