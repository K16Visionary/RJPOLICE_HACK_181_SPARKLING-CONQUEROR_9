<?php
// Include the database connection code at the beginning
$server = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the register number from the AJAX request
$registerNumber = $_GET['registerNumber'];

// Query the database to fetch the Name
$query = "SELECT Name FROM crime_reports WHERE `Report ID` = '$registerNumber'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Fetch the Name
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        // The Name is fetched successfully
        $Name = 'Your Report Status:<br><br>Your report has been successfully filed.<br>Your Report Acknowledgement NO. is ' . $registerNumber . '.<br>Name: ' . $row['Name'] . '.<br><br>Now, your report will be forwarded to the nearest Police station. After that, in one week, your report will be forwarded to the Court.';          
        // Echo the Name as the response
        echo $Name;
    } else {
        // The register number does not exist
        echo "Wrong Acknowledgement number provided. Please check your details and try again.";
    }
} else {
    // Handle the error if the query fails
    echo "Error retrieving Name";
}

// Close the database connection
mysqli_close($conn);
?>