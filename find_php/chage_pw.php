<?php
	include ("../dbcon.php");
	$id = $_POST['ch_id'];
	// $email = $_POST['ch_email'];
	$pw = $_POST['ch_pw'];

	$sql = "UPDATE `member` SET `pw` = '".$pw."' where id = '".$id."'";
	$result = mysqli_query($con,$sql);
	$check = mysqli_affected_rows($con);
	if($check)
	{
		echo "success";
	}else{
		echo "error";
	}
?>