<?php
	session_start();
	include("dbcon.php");
	$id = $_POST['id'];
	$pw = $_POST['pw'];

	$sql = "SELECT * FROM member where id = '".$id."' and pw = '".$pw."'";
	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_array($result);
	if($row)
	{
		$_SESSION['userid'] = $id;
		$_SESSION['userpw'] = $pw;
		$_SESSION['nickname'] = $row['nickname'];
		echo $row['nickname'];
		// echo "/".$row['nickname'];
	}else{
		echo "a";
	}
?>