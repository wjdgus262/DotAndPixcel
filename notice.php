<?php
	include ("dbcon.php");
	error_reporting(0);
	$mode = $_GET['mode'];
	$text = $_POST['text'];

	if(isset($mode))
	{
		$sql = "SELECT num,substring(`title`,1,10) as title,substring(bodytext,1,20) as bodytext,date,bhit,written,img1,img2, game_name,game_title FROM `notice` where title like '%".$text."%'";
		$result = mysqli_query($con,$sql);
	}else{
		$sql = "SELECT COUNT(`num`) as total FROM notice";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);

		$page_set = 10;
		$block_set = 10;

		$total = $row['total'];

		$total_page = ceil($total/$page_set);
		$total_block = ceil($total_page  /$block_set);

		$page = $_GET['page'];
		if(!$page) $page = 1;

		$block = ceil($page / $block_set);
		$limit_idx = ($page - 1) * $page_set;
		$sql = "SELECT num,substring(`title`,1,10) as title,substring(bodytext,1,20) as bodytext,date,bhit,written,img1,img2, game_name,game_title FROM `notice` order by num asc LIMIT $limit_idx,$page_set";
		$result = mysqli_query($con,$sql);
		$rows = mysqli_num_rows($result);
	}

	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="script/jquery-3.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="style/notice.css">
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
</head>
<body>
	<div class="all">
		<!-- <p class="back">뒤로가기</p> -->
		<!-- <div class="top">
			<div class="title">
				<p>DAP AND PIXEL GAMES</p>
			</div>
			<div class="close">
				<img src="header_img/close.png" alt="close">
			</div>
		</div> -->
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
				<!-- <h1>Notice</h1> -->
			</div>
			<div class="top_input">
				<div class="top_input_wrap">
					<div class="input_wrap_logo">
						<!-- <img src="noticelogo.png" alt="aa"> -->
						<div class="input_wrap_logo_right" style="margin-right: 5px;">
							<div class="logo_right_he">
								<h4>DAP GAMES</h4>
							</div>
							<div class="logo_right_he">
								<h4>검색하기</h4>
							</div>
						</div>
						<div class="input_wrap_logo_right" style="">
							<img src="sericon.png" alt="icon">
						</div>

					</div>
					<div class="input_this">
						<form method="POST" action="./notice.php?mode=ser">
							<input type="text" name="text" placeholder="제목을 입력해주세요" autocomplete="off">
							<button>검색</button>
						</form>
					</div>
				</div>
			</div>
			<div class="notice_table">
				<div class="notice_div">
					<table cellspacing="0">
						
						<tr style="height: 50px; max-height:35px" class="good">
							<th style="width: 60px; max-height:35px" >번호</th><th style="width: 120px;" style="height: 50px">제목</th><th style="width: 300px;">내용</th><th style="width: 120px;">등록일</th><th style="width: 120px;">조회수</th>
						</tr>
					</table>
					<div class="notice_aaa">
						<?php
							while($row = mysqli_fetch_array($result))
							{
						?>
						<div class="tda">
							<div class="num">
								<a href="./notice_view.php?bno=<?php echo $row['num']?>"><?php echo $row['num']?></a>
							</div>
							<div class="title">
								<a href="./notice_view.php?bno=<?php echo $row['num']?>"><?php echo $row['title']?>...</a>
							</div>
							<div class="text">
								<a href="./notice_view.php?bno=<?php echo $row['num']?>"><?php echo $row['bodytext']?>...</a>
							</div>
							<div class="date">
								<a href="./notice_view.php?bno=<?php echo $row['num']?>"><?php echo $row['date']?></a>
							</div>
							<div class="bhit">
								<a href="./notice_view.php?bno=<?php echo $row['num']?>"><?php echo $row['bhit']?></a>
							</div>
						</div>
						<?php
							}
						?>
					</div>
					<?php
							$first_page = (($block - 1) * $block_set) +1;
							$last_page = min($total_page,$block * $block_set);

							$prev_page = $page - 1;
							$next_page = $page + 1;

							$prev_block = $block - 1;
							$next_block = $block + 1;

							$prev_block_page = $prev_block * $block_set;
							$next_block_page = $next_block * $block_set - ($block_set - 1);

					?>
					<div class="numbers">
						<div class="prev_div">
							<?php
								if($prev_page > 0)
								{
									echo "<a href='./notice.php?page=$prev_page' class='prev_a'>prev</a>";
								}else{
									echo "<a href='#' class='prev_a'>prev</a>";
								}
							?>
						</div>
						<div class="block_div">
							<div class="num_div">

							<?php
								for($i = $first_page; $i<=$last_page; $i++)
								{
									if($i != $page)
									{
										echo "<a href='./notice.php?page=$i' class='a_block'>$i</a>";
									}else{
										echo "<a href='#' class='a_block'>$i</a>";
									}
								}
							?>
							</div>
						</div>
						<div class="next_div">
							<?php
								if($next_page > 0)
								{
									echo "<a href='./notice.php?page=$next_page' class='next_a'>next</a>";
								}else{
									echo "<a href='#' class='next_a'>next</a>";
								}
							?>

						</div>
					</div>
				</div>
			</div>
			<!-- <div class="numbers">
				<?php
					$first_page = (($block - 1) * $block_set) +1;
					$last_page = min($total_page,$block * $block_set);

					$prev_page = $page - 1;
					$next_page = $page + 1;

					$prev_block = $block - 1;
					$next_block = $block + 1;

					$prev_block_page = $prev_block * $block_set;
					$next_block_page = $next_block * $block_set - ($block_set - 1);

					if($prev_page > 0)
					{
						echo "<a href='./notice.php?page=$prev_page'>prev</a>";
					}else{
						echo "<a href='#'>prev</a>";
					}

					for($i = $first_page; $i<=$last_page; $i++)
					{
						if($i != $page)
						{
							echo "<a href='./notice.php?page=$i'>$i</a>";
						}else{
							echo "<a href='#' class='num_a'>$i</a>";
						}
					}

					if($next_page > 0)
					{
						echo "<a href='./notice.php?page=$next_page'>next</a>";
					}else{
						echo "#'>next</a>";
					}
				?>
			</div> -->
		</div>
<!-- 		<div class="bottom">
			
		</div> -->
	</div>
</body>
</html>