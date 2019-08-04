<?php
	session_start();
	echo $_SESSION['nickname'];
	$res = session_destroy();
	// if($res)
	// {
	// 	echo "성공";
	// }
?>