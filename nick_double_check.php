<?php
	include("dbcon.php");

	$nickname = $_POST['nickname'];
	$sql = "SELECT * FROM member where nickname = '".$nickname."'";
	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_array($result);
	if($row)
	{
		echo "empty";
	}else{
		echo "not_empty";
	}
?>