<?php
	include ("../dbcon.php");
	$id = $_POST['ch_id'];
	$email = $_POST['ch_email'];
	
	$sql = "SELECT * FROM `member` where `id` = '$id' and email = '$email'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	if($row)
	{
		echo $row['id'].",".$row['pw'];
	}else{
		echo "error";
	}
?>