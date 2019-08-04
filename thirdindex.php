	<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->

<link rel="stylesheet" type="text/css" href="style/popWindow.css">
	<!-- <script type="text/javascript" src="script/jquery-3.3.1.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
	<script src="js/popWindow.js" type="text/javascript" charset="utf-8"></script>
<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  	<link rel="stylesheet" type="text/css" href="libs/slick/slick/slick-theme.css">
  	
	 <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  
	




	<link rel="stylesheet" type="text/css" href="libs/slick/slick/slick.css">

		<link rel="stylesheet" type="text/css" href="style/header.css">

	<link rel="stylesheet" type="text/css" href="style/thirdindex.css">
	<link rel="stylesheet" type="text/css" href="style/header.css">
	<style type="text/css">
		.all_pp{
			color: #85878C;
		}
	</style>
<?php
	include("header.php");
	include("dbcon.php");
	// session_cache_expire(1);
	session_start();
	$id = $_SESSION['userid'];
	$nickname = $_SESSION['nickname'];
	// echo "<script>alert('$nickname');</script>";
	// echo "<script>alert('".$id."')</script>";
	// error_reporting(0);
	$mode = $_GET['mode'];
	if($mode == "ser")
	{
		$name = $_GET['name'];
		// echo "<script>alert('$name');</script>";
		$sql = "SELECT * FROM inde where name = '".$name."'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
		if($row == null)
		{
				$sql = "SELECT * FROM PC where name = '".$name."'";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_assoc($result);
				if($row == null)
				{
					$sql = "SELECT * FROM ps4 where name = '".$name."'";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_assoc($result);
					if($row == null)
					{
						$sql = "SELECT * FROM wii where name = '".$name."'";
						$result = mysqli_query($con,$sql);
						$row = mysqli_fetch_assoc($result);
						if($row == null)
						{
							?>
								<script type="text/javascript">
									var txt = "게임이 없습니다.";
			       	    			popWindow.dialog(txt, popWindow.dialog.typeEnum.error,{
									onOk:function()
									{
										window.history.back();
									}
								});
								</script>
							<?php
						}else{
							$location = $row['location'];
							$db_name = $row['name'];
							$img1 = $row['img1'];
							$img2 = $row['img2'];
							$img3 = $row['img3'];
							$info = $row['info'];
							$info1 = $row['info1'];
							$headerinfo = $row['headerinfo'];
							$bodyinfo = $row['bodyinfo'];
							$he_title = $row['he_titie'];
							$bno = $row['num'];
							$subimg1 = $row['subimg1'];
							$subimg2 = $row['subimg2'];
							$subimg3 = $row['subimg3'];
							$check = 4;
						}
					}else{
						$location = $row['location'];
						$db_name = $row['name'];
						$img1 = $row['img1'];
						$img2 = $row['img2'];
						$img3 = $row['img3'];
						$info = $row['info'];
						$info1 = $row['info1'];
						$headerinfo = $row['headerinfo'];
						$bodyinfo = $row['bodyinfo'];
						$he_title = $row['he_titie'];
						$bno = $row['num'];
							$subimg1 = $row['subimg1'];
							$subimg2 = $row['subimg2'];
							$subimg3 = $row['subimg3'];						
						$check = 3;
					}
				}else{
					$location = $row['location'];
					$db_name = $row['name'];
					$img1 = $row['img1'];
					$img2 = $row['img2'];
					$img3 = $row['img3'];
					$info = $row['info'];
					$info1 = $row['info1'];
					$headerinfo = $row['headerinfo'];
					$bodyinfo = $row['bodyinfo'];
					$he_title = $row['he_titie'];
					$bno = $row['num'];
							$subimg1 = $row['subimg1'];
							$subimg2 = $row['subimg2'];
							$subimg3 = $row['subimg3'];
					$check = 2;
				}
		}else{
			$location = $row['location'];
			$db_name = $row['name'];
			$img1 = $row['img1'];
			$img2 = $row['img2'];
			$img3 = $row['img3'];
			$info = $row['info'];
			$info1 = $row['info1'];
			$headerinfo = $row['headerinfo'];
			$bodyinfo = $row['bodyinfo'];
			$he_title = $row['he_titie'];
			$check = 1;
							$subimg1 = $row['subimg1'];
							$subimg2 = $row['subimg2'];
							$subimg3 = $row['subimg3'];
			$bno = $row['num'];
		}
	}else if($mode == "click")
	{
		$check = $_GET['title'];
		$bno = $_GET['bno'];
		// echo "<script>alert('$bno');</script>";
		if($check == 1)
		{
			$table = "inde";
			// echo "<script>alert('$table');</script>";
		}else if($check == 2)
		{
			$table = "pc";
		}else if($check == 3)
		{
			$table = "ps4";
		}else if($check == 4)
		{
			$table = "wii";
		}
		$sql = "SELECT * FROM $table where num = $bno";
		$result = mysqli_query($con,$sql);
	$row =mysqli_fetch_assoc($result);
	$location = $row['location'];
	$db_name = $row['name'];
	$img1 = $row['img1'];
	$img2 = $row['img2'];
	$img3 = $row['img3'];
	$info = $row['info'];
	$info1 = $row['info1'];
	$headerinfo = $row['headerinfo'];
	$bodyinfo = $row['bodyinfo'];
	$he_title = $row['he_titie'];
								$subimg1 = $row['subimg1'];
							$subimg2 = $row['subimg2'];
							$subimg3 = $row['subimg3'];
	$bno1 = $bno;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dap</title>
<style type="text/css">
.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div.active
{
	background-color: #E76A2F;
}
	b{
		color: black;
	}
	.xdsoft_autocomplete_dropdown > *{
		color: black;
	}
</style>
	<style type="text/css">

	.wrap{
		height: 12.5%;
	}


.slick-prev:before, .slick-next:before { font-family: "slick"; font-size: 100px; line-height: 1; color: white; opacity: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }   

.slick-prev:before { content: "‹"; margin-left: 110%; }
[dir="rtl"] .slick-prev:before { content: "›"; }

[dir="rtl"] .slick-next {  }
.slick-next:before { content: "›";;}
[dir="rtl"] .slick-next:before { content: "‹"; }

/*@media screen and(max-width: 1500px)
{
	.slick-next{
	position: absolute;
	left: 10%;
	}
}
@media screen and(min-width: 1500px)
{
	.slick-next{
	position: absolute;
	left: 40%;
	}
}*/
/*.aa{
	position: absolute;
	left: 10%;
}*/
.slick-next{
	position: absolute;
	left: 48%;
	}

		header{
			background: #354B57;
		}
	</style>
</head>
<body>
	<div class="img_zomm" id="subimg_zomm1">
		<div class="img_zomm_wrap">
			<div class="img_zomm_top">
			</div>
			<div class="img_zomm_body">
				 <img src="<?php echo $subimg1;?>" alt="img1">
			</div>
			<div class="img_zomm_button">
				<button class="img_prev_button" id="subimg1_prev">Prev</button>
				<button class="img_next_button" id="subimg1_next">Next</button>
			</div>
		</div>
	</div>
	<div class="img_zomm" id="subimg_zomm2">
		<div class="img_zomm_wrap">
			<div class="img_zomm_top">
			</div>
			<div class="img_zomm_body">
				 <img src="<?php echo $subimg2;?>" alt="img1">
			</div>
			<div class="img_zomm_button">
				<button class="img_prev_button" id="subimg2_prev">Prev</button>
				<button class="img_next_button" id="subimg2_next">Next</button>
			</div>
		</div>
	</div>
	<div class="img_zomm" id="subimg_zomm3">
		<div class="img_zomm_wrap">
			<div class="img_zomm_top">
			</div>
			<div class="img_zomm_body">
				 <img src="<?php echo $subimg3;?>" alt="img1">
			</div>
			<div class="img_zomm_button">
				<button class="img_prev_button" id="subimg3_prev">Prev</button>
				<button class="img_next_button" id="subimg3_next">Next</button>
			</div>
		</div>
	</div>
	<div id="all">
		<div class="content">
			<div class="bon">
				<div class="bon_top">
					<div class="bon_top_wrap">
						<p><?php echo $location ?></p>
						<h1><?php echo $db_name ?></h1>
					</div>
				</div>
				<div class="bon_bottom">
					<div class="bon_bottom_top">
						<div class="slide_wrap">
							<div class="img_wrap">
								<img src="<?php echo $img1 ?>" alt="12" >
							</div>
							<div class="img_wrap">
								<img src="<?php echo $img2 ?>" alt="12" >
							</div>
							<div class="img_wrap">
								<img src="<?php echo $img3 ?>" alt="12" >
							</div>
						</div>
						<div class="game_info">
							<div class="game_info_wrap">
								<div class="game_header">
									<img src="<?php echo $img1 ?>" alt="12" >
								</div>
								<div class="game_bodytext">
									<p>
										<?php echo $headerinfo?> 
									</p>
								</div>
								<div class="game_go">
									<p><?php echo nl2br($he_title); ?></p>
									<!-- <p>장르 : 액션</p>
									<p>출시날짜 : 2018-11-22</p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="bon_bottom_center">
						<div class="center_left">
							<div class="left_top">
								<img src="<?php echo $subimg1;?>" alt="img1" class='subimg_go1'>
								<img src="<?php echo $subimg2;?>" alt="img1" class='subimg_go2'>
								<img src="<?php echo $subimg3;?>" alt="img1" class='subimg_go3'>
							</div>
							<div class="left_bottom">
								<div class="left_bottom_top">
									<h1>게임에 대해서</h1>
									<p><?php echo nl2br($bodyinfo);?></p>
								</div>
								<div class="left_bottom_bottom">
									<div class="bt_top">
										<h1>게임 사양</h1>
									</div>
									<div class="bt_bottom">
										<div class="bt_bt_left">
											<p><?php echo nl2br($info); ?></p>
										</div>
										<div class="bt_bt_right">
											<p><?php echo nl2br($info1); ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="center_right">
							<div class="right_top">
								<p style="font-size: 20px; position: relative; left: 10%; top: 10%;">싱글플레이<br>
								멀티플레이<br>
								페어플레이<br>
								더티플레이<br>
								플레이</p>
							</div>
							<div class="right_bottom">
								<div class="right_input">
									<textarea class="comment_text" placeholder="내용을 입력해주세요"></textarea>
									<button class="comment_btn">입력</button>
								</div>


								<div class="comment_div">
								<?php
									$sql = "SELECT * FROM `comment` WHERE `title` = $check and bno = $bno";
									$result1 = mysqli_query($con,$sql);
									$row1 = mysqli_fetch_array($result1);
									if($row1)
									{
										$sql = "SELECT COUNT(`num`) as total FROM `comment` WHERE `title` = $check and bno = $bno ";
										$result = mysqli_query($con,$sql);
										$row = mysqli_fetch_array($result);

										$page_set = 5;
										$block_set = 5;

										$total = $row['total'];

										$total_page = ceil($total/$page_set);
										$total_block = ceil($total_page / $block_set);

										$page = $_GET['page'];
										if(!$page) $page = 1;

										$block = ceil($page / $block_set);
										$limit_idx = ($page - 1) * $page_set;
										$sql = "SELECT * FROM `comment` where `title` = $check and `bno` = $bno order by bno DESC LIMIT $limit_idx,$page_set";
										$result = mysqli_query($con,$sql);
										$rows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{
											?>
												<div class="coment_wrap">
													<div class="co_wr_top">
														<div class="wr_top_left">
															<p><?php echo $row['nickname']?></p>
														</div>
														<div class="wr_top_right">
															<?php
																if($id == $row['id'])
																{
																	?>
																	<a style="color:white;" href="<?php echo $row['num']?>" class='right_delete'>삭제</a>
																	<?php
																}
															?>
														</div>
													</div>
													<div class="co_wr_bottom">
														<p><?php echo $row['text']?></p>
													</div>
												</div>
											<?php
										}
									}else{
										?>
										<p style="color: white; text-align: center;">이런! 아직 댓글이 없네요~<br>첫 댓글에 주인공이 되보세요!</p>
										<?php
									}
								?>
								</div>
								<?php
									$first_page = (($block - 1) * $block_set) + 1;
									$last_page = min($total_page,$block * $block_set);

									$prev_page = $page - 1;
									$next_page = $page + 1;

									$prev_block = $block - 1;
									$next_block = $block + 1;

									$prev_block_page = $prev_block * $block_set;
									$next_block_page = $next_block * $block_set - ($block_set - 1);
								?>
								<div class="comment_block">
									<div class="block_prev">
										<?php
											if($prev_page > 0)
											{
												echo "<a href='thirdindex.php?mode=$mode&bno=$bno&title=$check&page=$prev_page' class='prev_a'>prev</a>";
											}else{
												echo "<a href='#' class='prev_a'>prev</a>";
											}
										?>
									</div>
									<div class="block_center">
										<?php
											for($i = $first_page; $i<=$last_page; $i++)
											{
												if($i != $page)
												{
													echo "<a href='thirdindex.php?mode=$mode&bno=$bno&title=$check&page=$i' class='num_a'>$i</a>";
												}else{
													echo "<a href='#' class='num_a'>$i</a>";
												}
											}
										?>
									</div>
									<div class="block_next">
										<?php
											if($next_page <= $total_page)
											{
												echo "<a href='thirdindex.php?mode=$mode&bno=$bno&title=$check&page=$next_page' class='next_a'>next</a>";
											}else{
												echo "<a href='#' class='next_a'>next</a>";
											}
										?>
									</div>
								</div>
								<!-- <?php
									

									if($prev_page > 0)
									{
										echo "<a href='thirdindex.php?mode=$mode&bno=$bno&title=$check&page=$prev_page'>[prev]</a>";
									}else{
										echo "<a href='#'>[prev]</a>";
									}
									for($i = $first_page; $i<=$last_page; $i++)
									{
										if($i != $page)
										{
											echo "<a href='thirdindex.php?mode=$mode&bno=$bno&title=$check&page=$i'>$i</a>";
										}else{
											echo "<a href='#'>$i</a>";
										}
									}
									if($next_page <= $total_page)
									{
										echo "<a href='thirdindex.php?mode=$mode&bno=$bno&title=$check&page=$next_page'>[next]</a>";
									}else{
										echo "<a href='#'>[next]</a>";
									}
								?> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="right_top_re">
					<div class="top_img_wrap">
						<a href="https://www.youtube.com/user/mkvidio"><img src="youtubeimg/kim.png" alt="gamenut"></a>
						<p>메탈킴 리뷰</p>
					</div>
					<div class="top_img_wrap">
						<a href="https://www.youtube.com/channel/UCMru5gvumXqykoro-yDwQCw"><img src="youtubeimg/gamenut.png" alt="gamenut"></a>
						<p>게임넛 리뷰</p>
					</div>
					<div class="top_img_wrap">
						<a href="https://www.youtube.com/user/khan0925"><img src="youtubeimg/home.png" alt="gamenut"></a>
						<p>집마 리뷰</p>
					</div>
					<div class="top_img_wrap">
						<a href="https://www.youtube.com/channel/UCVes_P0Cc87L48_KvdyNX9w"><img src="youtubeimg/taco.png" alt="gamenut"></a>
						<p>타코 리뷰</p>
					</div>
				</div>
				<div class="right_notice">
					<div class="notice_wrap">
						<div class="notice_wrap_top">
							<?php
								$sql_no = "SELECT * FROM `notice` ORDER BY `bhit` DESC";
								$result_no = mysqli_query($con,$sql_no);
								$row_no = mysqli_fetch_array($result_no);
								$no_num = $row_no['num'];
							?>
							<h2>공지사항</h2>
						</div>
						<div class="notice_wrap_bottom" style="overflow:hidden;">
							<p><?php echo $row_no['bodytext']?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<!-- <script src="autocom/jquery.autocomplete.js"></script>
<script type="text/javascript" src="array/array.js">
</script>
<script type="text/javascript">
$(function() {
	$(".aaa").autocomplete({
		source:[states]
	}); 
});
</script> -->


<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="autocom/jquery.autocomplete.js"></script>
<script type="text/javascript" src="array/array.js">
</script>
<script type="text/javascript">
$(function() {
	$(".aaa").autocomplete({
		source:[states]
	}); 
});
</script>

<script type="text/javascript" src="libs/slick/slick/slick.js"></script>





<script type="text/javascript">
	$(document).ready(function(){
		$('.slide_wrap').slick({
			autoplay: true,
			arrows: false
		});
		$(document).mouseup(function(e){
			var container = $(".img_zomm");
			if(container.has(e.target).length === 0)
			{
				$(".img_zomm").hide();
			}
		});
		$(".subimg_go1").click(function(){
			$("#subimg_zomm1").show();
		});
		$(".subimg_go2").click(function(){
			$("#subimg_zomm2").show();
		});
		$(".subimg_go3").click(function(){
			$("#subimg_zomm3").show();
		});
		$("#subimg1_prev").click(function(){
			$("#subimg_zomm1").hide();
			$("#subimg_zomm3").show();
		});
		$("#subimg3_prev").click(function(){
			$("#subimg_zomm3").hide();
			$("#subimg_zomm2").show();
		});
		$("#subimg2_prev").click(function(){
			$("#subimg_zomm2").hide();
			$("#subimg_zomm1").show();
		});
		$("#subimg1_next").click(function(){
			$("#subimg_zomm1").hide();
			$("#subimg_zomm2").show();
		});
		$("#subimg2_next").click(function(){
			$("#subimg_zomm2").hide();
			$("#subimg_zomm3").show();
		});
		$("#subimg3_next").click(function(){
			$("#subimg_zomm3").hide();
			$("#subimg_zomm1").show();
		});
	});
	$(".comment_btn").click(function () {
		var a = $("#login_bt").text();
		if(a == "로그아웃")
		{
			comment();
		}else if(a == "로그인")
		{
			var txt=  "로그인 해주세요.";
			popWindow.dialog(txt, popWindow.dialog.typeEnum.error,{
				onOk:function(){
       	   						// location.reload();
       	   						$("#modal_login").show();
	 							$('.loginid').focus();
       	   		}
			});
			return false;
		}
        
    });

	function comment(){
		var text = $(".comment_text").val();
		if(text == '')
		{
			var txt=  "내용을 입력해주세요.";
			popWindow.dialog(txt, popWindow.dialog.typeEnum.error);
			return false;
		}else{
			$.ajax({
				type:"POST",
				url:"./comment.php",
				data:"title="+<?php echo $check;?>+"&bno="+<?php echo $bno?>+"&text="+text,
				success:function(data){
					var txt=  "댓글입력성공.";
					popWindow.dialog(txt, popWindow.dialog.typeEnum.success,{
						onOk:function(){
       	   						location.reload();
       	   				}
					});
					// alert("댓글 입력 성공");
					// location.reload();
				}
			});
		}
	}

	$(".right_delete").click(function(a){
		a.preventDefault();
		var aa = $(this).attr("href");
		var txt=  "댓글을 삭제하시겠습니까?";
		popWindow.dialog(txt, popWindow.dialog.typeEnum.confirm,{
			onOk:function()
			{
				$.ajax({
					type:"POST",
					url:"./comment_delete.php",
					data:"num="+aa,
					success:function(data)
					{
						if(data == "success")
						{
							var txt=  "댓글삭제성공.";
							popWindow.dialog(txt, popWindow.dialog.typeEnum.success,{
								onOk:function(){
       	   							location.reload();
       	   					}
							});
						}else{
								var txt=  "댓글 삭제 실패.";
							popWindow.dialog(txt, popWindow.dialog.typeEnum.error);
							return false;
						}
					}
				});
			}
		});
	});
		$(".notice_wrap").click(function(){
			var windowW = 1200;  // 창의 가로 길이
        var windowH = 800;  // 창의 세로 길이
		var left = Math.ceil((window.screen.width - windowW)/2);
        var top = Math.ceil((window.screen.height - windowH)/2);
		window.open("./notice_view.php?bno=<?php echo $no_num;?>","pop_01","l top="+top+", left="+left+", height=800, width=1200");
		});
</script>
</html>