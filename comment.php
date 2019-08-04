<?php
	session_start();

	$id = $_SESSION['userid'];
	$nickname = $_SESSION['nickname'];
	include("dbcon.php");
	// error_reporting(0);
	$title = $_POST['title'];
	$bno = $_POST['bno'];
	$text = $_POST['text'];
	// $nickname = $_POST['nickname'];
	// echo $nickname;
	// echo $title."  ".$bno." ".$text." ".$id." ";

	$sql = "insert into comment(`id`,`nickname`,`title`,`bno`,`text`) values ('$id','$nickname',$title,$bno,'$text')";
	mysqli_query($con,$sql);
	mysqli_close($con);



?>