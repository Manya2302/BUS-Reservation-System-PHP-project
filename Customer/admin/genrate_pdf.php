<?php
require_once('session_login.php');

// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

if (isset($_POST['create_pdf'])) {
    $bookTracker = $_POST['book_tracker'];
    
    // Establish a database connection (replace with your own credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bms";
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Fetch booking details from the database based on the book_tracker
    $sql = "SELECT * FROM booked WHERE book_tracker = '$bookTracker'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $bookingDetails = $result->fetch_assoc();
        
        // Generate the PDF
        createPDF($bookingDetails);
    } else {
        echo "No booking found with the provided book tracker.";
    }
    
    // Close the database connection
    $conn->close();
}

// Function to create the PDF

function createPDF($bookingDetails) {
    // Create a new TCPDF instance
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
    // Set the document information
    $pdf->SetCreator('AM BUS Ticketing Admin');
    $pdf->SetAuthor('AM BUS');
    $pdf->SetTitle('Booking Details');
    $pdf->SetSubject('Booking Details');
    
    // Add a page
    $pdf->AddPage();
    
    // Set the font for the heading
    $pdf->SetFont('helvetica', 'B', 24);
    
    // Output the AM BUS logo
    
    
    // Output the title
    $pdf->Cell(0, 10, 'AM BUS', 0, 1, 'C');
    $pdf->Ln(10);
    
    // Set the font size for the content
    $pdf->SetFont('helvetica', 'B', 16);
    
    // Output the booking details
    $html = '
    <table border="1" cellpadding="5">
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Booked By</td>
            <td>' . $bookingDetails['book_by'] . '</td>
        </tr>
        <tr>
            <td>Contact</td>
            <td>' . $bookingDetails['book_contact'] . '</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>' . $bookingDetails['book_address'] . '</td>
        </tr>
        <tr>
            <td>Booking Name</td>
            <td>' . $bookingDetails['book_name'] . '</td>
        </tr>
        <tr>
            <td>Age</td>
            <td>' . $bookingDetails['book_age'] . '</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>' . $bookingDetails['book_gender'] . '</td>
        </tr>
        <tr>
            <td>Departure Date</td>
            <td>' . $bookingDetails['book_departure'] . '</td>
        </tr>
    </table>
';

// Output the table
$pdf->writeHTML($html);

// Output the PDF as a download
$pdf->Output('booking_details.pdf', 'D');
exit();
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AM BUS</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">

    <!-- Custom CSS -->
    <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AM BUS Ticketing Admin</a>
            <ul class="nav navbar-nav">
                <li class="active"><a href="reservation.php">Reserved
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                </a></li>
                <li class=""><a href="transaction.php">Transaction
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                </a></li>
                <li class="active"><a href="genrate_pdf.php">PDF
					<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
				</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    <br />
    <div class="container-fluid">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="book-table"></div>
        </div>
        <div class="col-md-1"></div>
    </div>

    <form method="post" action="">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="book_tracker">Book Tracker:</label>
                        <input type="text" class="form-control" name="book_tracker" id="book_tracker" placeholder="Enter Book Tracker">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="create_pdf">Create PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php require_once('modal/view_passenger.php'); ?>
    <?php require_once('modal/message.php'); ?>
    <?php require_once('modal/confirmation.php'); ?>

    <script type="text/javascript" src="../assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
</body>
</html>
