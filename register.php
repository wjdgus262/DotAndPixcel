<?php
	include("dbcon.php");
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$nick = $_POST['nick'];
	$mail = $_POST['mail'];
	$phone = $_POST['phone'];

	$sql = "INSERT INTO member (`id`,`pw`,`nickname`,`email`,`phone`) values ('$id','$pw','$nick','$mail','$phone')";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		echo "success";
	}else{
		echo "error";
	}
?>