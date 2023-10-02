<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
    <!-- Add necessary CSS and JavaScript libraries -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Custom CSS for the admin panel */
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Customer</h2>
        <?php
        // Function to retrieve a specific customer's details from the database based on the ID
        function getCustomer($id) {
            // Implement the necessary database connection and query execution based on your setup
            $dbHost = "localhost";
            $dbUser = "root";
            $dbPass = "";
            $dbName = "bms";

            // Create a new PDO instance
            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare and execute the query
            $query = "SELECT * FROM users WHERE id = :id";
            $statement = $pdo->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            // Fetch the row as an associative array
            $customer = $statement->fetch(PDO::FETCH_ASSOC);

            // Close the database connection
            $pdo = null;

            return $customer;
        }

        // Assuming you have access to the necessary data for customer details
        $customer = getCustomer($_GET['id']); // Function to retrieve a specific customer's details from the database based on the ID passed via GET parameter

        // Check if the form is submitted for updating the customer's information
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the updated information from the form
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $role = $_POST['role'];

            // Perform the necessary update query to update the customer's information in the database
            // Modify the query based on your database structure and column names
            $dbHost = "localhost";
            $dbUser = "root";
            $dbPass = "";
            $dbName = "bms";

            // Create a new PDO instance
            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare and execute the update query
            $updateQuery = "UPDATE users SET firstname=:firstname, lastname=:lastname, username=:username, email=:email, phonenumber=:phone, gender=:gender, age=:age, role=:role WHERE id=:id";
            $statement = $pdo->prepare($updateQuery);
            $statement->bindParam(':firstname', $firstname);
            $statement->bindParam(':lastname', $lastname);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':phone', $phone);
            $statement->bindParam(':gender', $gender);
            $statement->bindParam(':age', $age);
            $statement->bindParam(':role', $role);
            $statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $success = $statement->execute();

            // Close the database connection
            $pdo = null;

            // Display success or error message
            if ($success) {
                echo '<div class="alert alert-success" role="alert">Customer information updated successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Failed to update customer information.</div>';
            }
        }
        ?>

        <!-- Display the customer details in an edit form -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $customer['firstname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $customer['lastname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $customer['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $customer['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $customer['phonenumber']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male" <?php if ($customer['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($customer['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($customer['gender'] === 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $customer['age']; ?>" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $customer['role']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Include necessary JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
