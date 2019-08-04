<?php
	include("dbcon.php");

	$num = $_POST['num'];
	$sql = "delete from comment where num = ".$num;
	$result = mysqli_query($con,$sql);
	if($result)
	{
		echo "success";
	}else{
		echo "a";
	}
?>