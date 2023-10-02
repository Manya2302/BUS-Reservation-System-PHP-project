<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bms";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phonenumber = $_POST["phonenumber"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $role = "customer";

    // Insert user into the database
    $sql = "INSERT INTO users (username, password, email, role, firstname, lastname, phonenumber, gender, age) VALUES ('$username', '$password', '$email', '$role', '$firstname', '$lastname', '$phonenumber', '$gender', '$age')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        /* CSS styles for registration page */
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

        label, input, select {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .register-button {
            background-color: #8f35e3;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-left: 150px;
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

        .error {
            color: red;
        }

    </style>
    <script>
       window.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registrationForm");

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    const errorMessages = [];

    // Validate username
    var username = document.forms["registrationForm"]["username"].value;
    if (username.length < 7 || username.length > 15) {
      errorMessages.push(
        "Username must have a length of 7-15 characters."
      );
    }

    // Validate password
    var password = document.forms["registrationForm"]["password"].value;
    if (password.length < 7 || password.length > 15) {
      errorMessages.push(
        "Password must have a length of 7-15 characters."
      );
    }

    // Validate email
    const emailInput = document.getElementById("email");
    const emailValue = emailInput.value.trim();
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
      errorMessages.push("Invalid email address.");
    }

    // Validate first name and last name
    const firstnameInput = document.getElementById("firstname");
    const firstnameValue = firstnameInput.value.trim();
    const lastnameInput = document.getElementById("lastname");
    const lastnameValue = lastnameInput.value.trim();
    const nameRegex = /^[A-Za-z]{1,25}$/;
    if (
      !nameRegex.test(firstnameValue) ||
      !nameRegex.test(lastnameValue)
    ) {
      errorMessages.push(
        "Invalid first name or last name. They must contain 1-25 letters."
      );
    }

    // Validate phone number
    const phonenumberInput = document.getElementById("phonenumber");
    const phonenumberValue = phonenumberInput.value.trim();
    if (!/^\d{10}$/.test(phonenumberValue)) {
      errorMessages.push(
        "Invalid phone number. It must contain 10 digits."
      );
    }

    // Display error messages
    if (errorMessages.length > 0) {
      alert(errorMessages.join("\n"));
    } else {
      form.submit();
    }
  });
});

    </script>
</head>
<body>
    <div class="container">
        <h2>Registration</h2>
        <form id="registrationForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- Form fields -->
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" required><br>
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" required><br>
            <label for="phonenumber">Phone Number:</label>
            <input type="text" name="phonenumber" id="phonenumber" required><br>
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br>
            <label for="age">Age:</label>
            <input type="number" name="age" required><br>
            <button class="register-button" value="Register">Register</button>
        </form>
        <div id="errorContainer"></div>
        <br>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
