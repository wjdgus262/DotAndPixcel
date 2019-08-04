<?php
	include("dbcon.php");
	$bno = $_GET['bno'];
	error_reporting(0);
	if(!empty($bno) && empty($_COOKIE['board_free'.$bno]))
	{
		$sql = 'update notice set bhit = bhit + 1 where num = ' . $bno;
		$result = $con->query($sql); 
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php 
		}
	}else{
		setcookie('board_free'.$bno,TRUE, time() + (60 * 60 * 24),'/');
	}

	$sql1 = "SELECT * FROM notice where num = ".$bno."";
	$result1 = mysqli_query($con,$sql1);
	$row = mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="script/jquery-3.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="style/notice_view.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$(".back").click(function(){
				// alert("aa");
				window.history.back();
			});
			$(".front").click(function(){

				window.history.go(1);
				return false;
			});
		});
	</script>
	<title></title>
</head>
<body>
	<div class="all">
		<div class="notice_body">
			<div class="top_title">
				<div class="top_title_wrap">
					<div class="back">
						<img src="notice_img/back.png" alt="back" class="back">
					</div>
					<div class="top_wrap_title">
						<h1>공지사항</h1>
					</div>
					<div class="go">
						<img src="notice_img/front.png" alt="front" class="front">
					</div>	
				</div>
			</div>
			<div class="notice_title">
				<div class="no_tl_left">
					<p>공지사항</p>
				</div>
				<div class="no_tl_right">
					<p><?php echo $row['title']?></p>
				</div>
			</div>
			<div class="no_tl_whire">
					<div class="no_tl_left">
						<p>작성자</p>
					</div>
					<div class="no_tl_a">
						<p><?php echo $row['written']?></p>
					</div>
					<div class="no_tl_number">
						<p><?php echo $row['bhit']?></p>
					</div>
					<div class="no_tl_right1">
						<p>조회수</p>
					</div>
			</div>
			<div class="no_game">
				<div class="no_game_left">
					<p><?php echo $row['game_name']?></p>
				</div>
				<div class="no_game_right">
					<div class="no_game_img">
						<img src="<?php echo $row['img1']?>" alt="call">
					</div>
					<div class="no_game_title">
						<p><?php echo $row['game_title']?></p>
					</div>
				</div>
			</div>
			<div class="no_body">
				<div class="no_body_img">
					<img src="<?php echo $row['img2']?>" alt='aaa'>
				</div>
				<div class="no_body_text">
					<p style="text-align: center;"><?php echo nl2br($row['bodytext'])?></p>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>