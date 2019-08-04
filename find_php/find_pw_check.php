<?php
	include ("../dbcon.php");
	$id = $_POST['id'];
	// echo $id;
	// $pw = ['pw'];


	$sql = "SELECT * from `member` where id = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	if($row)
	{
		$pw = $row['pw'];
		echo $pw;
	}else{
		echo "error";
	}
?>