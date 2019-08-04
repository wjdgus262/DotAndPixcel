<?php
	include("dbcon.php");
	error_reporting(0);
	$title = $_POST['title'];
	$bno = $_POST['bno'];
	$text = $_POST['text'];
	// // echo $title."    ".$bno;
	// $con = mysqli_connect("localhost","root","","web_pe");
	$sql = "insert into compat(`id`,`title`,`bno`,`Contents`) values ('user1','$title','$bno','$text')";
	mysqli_query($con,$sql);
	mysqli_close($con);
?>