<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crime Reporting System- Report A Crime</title>
	<style>
		*{
			box-sizing: border-box;
			font-family: sans-serif;
		}
		
		.wrapper{
			letter-spacing: 1px;
			font-size: 25px;
			float: left;
			color: blue;
			text-align: center;
			margin-left: 25%;
		}
		.image{
			width:25%;
			height:25%;
			display: flex;
			justify-content: center;
			align-items: center;
			margin-left: 35%;
		}
	</style>
</head>
<body> 
		<img src="../image/checkmark.jpg" class="image" alt="checkmark">
</body>
</html>

<?php

	$server= "localhost";
	$username= "root";
	$password= "";
	$dbname= "test";
	
	
	$conn = mysqli_connect($server, $username, $password, $dbname);
	
	if(isset($_POST['name'])){
		
		if(!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['age']) && !empty($_POST['state']) && !empty($_POST['phone']) && !empty($_POST['aadhaar']) && !empty($_POST['fraud']) && !empty($_POST['account']) && !empty($_POST['creditted'])&& !empty($_POST['amount'])&& !empty($_POST['date'])&& !empty($_POST['desc'])){
			
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$state = $_POST['state'];
			$phone = $_POST['phone'];
			$aadhaar = $_POST['aadhaar'];
			$fraud = $_POST['fraud'];
			$account = $_POST['account'];
			$creditted = $_POST['creditted'];
			$amount = $_POST['amount'];
			$date = $_POST['date'];
			$desc = $_POST['desc'];
			
			$query = "INSERT INTO `test`.`crime_reports` (`Name`, `Gender`, `Age`, `State`, `Mobile Number`, `Aadhaar No.`, `Money transfer name`, `Victim Account Number`, `Credited Account Number`, `Amount`, `Date/Time of Fraud`, `Description`, `Complaint Filing Date`) VALUES ('$name', '$gender', '$age', '$state', '$phone', '$aadhaar', '$fraud', '$account', '$creditted', '$amount', '$date', '$desc', current_timestamp())";

			
			$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
			
			if($run){
				$last_id = mysqli_insert_id($conn);
echo "<div class='wrapper'> The details provided by you have been succesfully recorded!!<br>Your can Take Screen Shot for Your Future References and This complaint made by you And <b> Your Report Acknowledgement NO.- is $last_id.</b><br><a href='../index.html'> Click here </a> to return to the Main page!! </div>";
			}
			else{
				echo "Unable to File your Complaint!!!<br> Please TRY AGAIN!!!" ;
			}
		}
		else{
			
			echo "All Fields are Required";
		}
	}
?>


