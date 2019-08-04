<?php
	include("dbcon.php");

	$id = $_POST['id'];
	$sql = "SELECT * FROM member where id = '".$id."'";
	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_array($result);
	if($row)
	{
		echo "empty";
	}else{
		echo "not_empty";
	}
?>