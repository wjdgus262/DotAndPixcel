<?php
	include ("../dbcon.php");

	$nick = $_POST['nick'];
	$email = $_POST['email'];
	// echo $email;
	$sql = "SELECT * FROM `member` WHERE `nickname` = '$nick' and email = '$email'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	if($row)
	{
		$id = $row['id'];
		echo $id;
	}else{
		echo "error";
	}

?>