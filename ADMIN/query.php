<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include "includes/db.php";
include "includes/header.php";
include "includes/admin_navigation.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Admin</title>
    <link rel="stylesheet" href="path/to/your/css/file.css">
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Navigation code here -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                           
                        </h1>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $query = "SELECT * FROM contacts";
                                $result = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $message = $row['message'];
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td><a href='query.php?delete=<?php echo $id; ?>'>Delete</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php
                        if (isset($_GET['delete'])) {
                            $id = $_GET['delete'];
                            $query = "DELETE FROM contacts WHERE id = $id";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: query.php");
                            if (!$delete_query) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="path/to/your/js/file.js"></script>
</body>

</html>
