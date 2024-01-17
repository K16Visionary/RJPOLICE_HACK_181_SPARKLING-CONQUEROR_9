<?php
session_start();
if(isset($_SESSION['username'])){
	
	session_destroy();

	echo "<script> location.href='Police Login.html' </script> ";
}
else{
	
	echo "<script> location.href='Police Login.html' </script> ";
}

?>