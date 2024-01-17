<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 20px;
    }

    .report-container {
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .report-title {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .report-description {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .report-content {
        line-height: 1.5;
    }

    .report-signature {
        font-weight: bold;
        margin-top: 20px;
    }
    .home-button {
        background-color: #4CAF50; /* Green background color */
        border: none; /* Remove border */
        color: white; /* Text color */
        padding: 10px 20px; /* Add padding */
        text-align: center; /* Center align text */
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Display as inline-block */
        font-size: 16px; /* Font size */
        margin-bottom: 20px; /* Add some spacing */
        cursor: pointer; /* Change cursor to pointer */
        transition: background-color 0.3s; /* Add transition effect */
    }

    .home-button:hover {
        background-color: #45a049; /* Darker green background color on hover */
    }
    </style>
</head>
<body>
<button class="home-button" onclick="window.location.href = 'index.html';">Home</button>
<?php
// Check if the report ID is provided in the URL
if (isset($_GET['report_id'])) {
    $reportId = $_GET['report_id'];

    // TODO: Retrieve the report details from the database based on the report ID
    // Replace this with your actual code to fetch report details from the database

    // For demonstration purposes, let's assume we have fetched the report details as an associative array called $report
    $report = [
        'id' => $reportId,
        'title' => 'Cyber Crime Court Report - Report ID #' . $reportId,
        'description' => 'This is your report id = ' . $reportId,
        'victim_name' => 'John Doe', // Assuming victim_name is the victim ID
        'content' => 'After thorough preparation, we are pleased to inform you that your court report, documenting the details of the case for Victim , has been successfully transferred to the nearest court. We appreciate your cooperation in providing the necessary information. Rest assured, you will be notified promptly through a message once the court completes the processing of your report file. Thank you for your patience and collaboration throughout this legal process.',
        // Add more report details as needed
    ];

    // Generate the report content (letter)
    $victimId = $report['victim_name'];

    echo '<html>';
    echo '<head><title>' . $report['title'] . '</title>';
    echo '<link rel="stylesheet" type="text/css" href="styles.css">';
    echo '</head>';
    echo '<body>';
    echo '<div class="report-container">';
    echo '<h1 class="report-title">' . $report['title'] . '</h1>';
    echo '<p class="report-description">' . $report['description'] . '</p>';
    echo '<p class="report-content">' . $report['content'] . '</p>';
    echo '<p class="report-signature">Sincerely,</p>';
    echo '<p class="report-signature">XYZ Court</p>';
    echo '</div>';
    echo '</body>';
    echo '</html>';

    exit();
} else {
    // If the report ID is not provided, redirect back to the main page
    header('Location: index.php');
    exit();
}
?>
</body>
</html>