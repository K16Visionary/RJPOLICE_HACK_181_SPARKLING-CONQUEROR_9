<?php 

$server= "localhost";
$username= "root";
$password= "";
$dbname= "test";
	
$conn = mysqli_connect($server, $username, $password, $dbname);

	if($conn){
	?>
		<script>
			alert('Connecting to the database !!!');
		</script>
	<?php
	}
	else{
		die("No Connection".mysqli_connect_error());
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Complaints</title>
    <?php include 'link.php'; ?>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://use.fontawesome.com/602bbd89d0.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="Police Login.html">Go Back</a></li>
        </ul>
        <div class="logo">
            <p>Police Login- Currently Viewing Complaints</p>
        </div>
    </nav>

    <div class="main-div">
        <h1>Registered Complaints</h1>
        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>State</th>
                            <th>Mobile Number</th>
                            <th>Aadhaar No.</th>
                            <th>Money transfer name</th>
                            <th>Victim Account Number</th>
                            <th>Credited Account Number</th>
                            <th>Amount</th>
                            <th>Date/Time of Fraud</th>
                            <th>Description</th>
                            <th>Complaint Filing Date</th>
                            <th colspan="2">Status</th>
                            <th colspan="1">Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $selectquery = "SELECT * FROM crime_reports";
                            $query = mysqli_query($conn, $selectquery);
                            $num = mysqli_num_rows($query);

                            while ($res = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td class="id"><?php echo $res['Report ID']; ?></td>
                                <td><?php echo $res['Name']; ?></td>
                                <td><?php echo $res['Gender']; ?></td>
                                <td><?php echo $res['Age']; ?></td>
                                <td><?php echo $res['State']; ?></td>
                                <td><?php echo $res['Mobile Number']; ?></td>
                                <td><?php echo $res['Aadhaar No.']; ?></td>
                                <td><?php echo $res['Money transfer name']; ?></td>
                                <td><?php echo $res['Victim Account Number']; ?></td>
                                <td><?php echo $res['Credited Account Number']; ?></td>
                                <td><?php echo $res['Amount']; ?></td>
                                <td><?php echo $res['Date/Time of Fraud']; ?></td>
                                <td><?php echo $res['Description']; ?></td>
                                <td><?php echo $res['Complaint Filing Date']; ?></td>
                                <td><button class="btn1">Pending</button></td>
                                <td><button class="btn2"><a href="delete.php?id=<?php echo $res['Report ID']; ?>">Resolved <i class="fa fa-trash" aria-hidden="true"></i></a></button></td>
                                <td><a href="generate_report.php?report_id=<?php echo $res['Report ID']; ?>">Generate Report</a></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>