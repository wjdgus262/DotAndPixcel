<?php
	include("dbcon.php");

	$email = $_POST['email'];
	$sql = "SELECT * FROM member where email = '".$email."'";
	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_array($result);
	if($row)
	{
		echo "empty";
	}else{
		echo "not_empty";
	}
?>