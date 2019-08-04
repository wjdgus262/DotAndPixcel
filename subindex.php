<?php
	session_start();
	// session_cache_expire(1);
	// $con = mysqli_connect("localhost","root","","web_pe");
	// include("header.php");
		include("header.php");
	include("dbcon.php");
	error_reporting(0);
	$id = $_SESSION['userid'];
	// echo "<script>alert('$id');</script>";
	$table = "inde";
	if(isset($_GET['title']))
	{
		$check = $_GET['title'];
		if($check == 1)
		{
			$table = "inde";
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
	}else{
		$table = "inde";
	}

	// echo "<script>alert('$check');</script>"
		
?>
<!DOCTYPE html>
<html>
<head>


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Dap</title>




	<link rel="stylesheet" type="text/css" href="libs/slick/slick/slick-theme.css">
	 <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  
	


	<link rel="stylesheet" type="text/css" href="libs/slick/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="style/header.css">
	<link rel="stylesheet" type="text/css" href="style/style2.css">


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
	.all_pp{
			color: #85878C;
		}
		/*.login_cancel{
			top: 35%;
		}*/
</style>
</head>
<body>
	<div id="all" style="height: intrinsic; width: 1653px;">
		<div id="content">
			<div id="back">
				<img src="img/back_1.png" alt="back">
			</div>
			<div id="front" style="">
				
			</div>
			<div id="finfo">
					<?php
						if($check == 1)
						{
							echo "<h1 style='font-size:35px'>인디게임 추천목록</h1>";
						}else if($check == 2)
						{
							echo "<h1 style='font-size:35px'>PC게임 추천목록</h1>";
						}else if($check == 3)
						{
							echo "<h1 style='font-size:35px'>PS4 추천목록</h1>";
						}else{
							echo "<h1 style='font-size:35px'>WII 추천목록</h1>";
						}
					?>
					<!-- <h1 style="font-size: 35px">추천목록</h1> -->
					<!-- <a href="#"><img src="img/logo.png" alt="logo"></a> -->
					<h2 style="color: white; margin-top: 10px; font-size: 40px">DAP Games 게임에서추천목록</h2>
					<h3 id="hinfo" style="font-size: 20px;">추천 목록을 찾아보시고 새로운 게임을<br>
					만나도록 하세요</h3>
					<?php
						if($check == 1)
						{
					?>
					<p style="clear: both; font-size: 12px; position: relative; top: 10%;">인디 게임(Indie Game, Independent Game)이란 유통이나 스폰서 등의 간섭에서<br>
						 독립적인 게임을 말하는 단어다. 인디 게임이라는 단어가 등장할 초기에는 해당 <br>
						 정의로만 쓰였으나, 시간이 지남에 따라 인디 레이블의 대형화, 유통 과정에서의 <br>
						 스팀과 같은 존재로 인해서 새로운 정의가 필요하게 되었는데, 이는 다음과 같다.<br>
						소형 개발사에서 대형 기획사나 게임 회사에서의 지원을 받지 않고, 스스로의 힘<br>으로
						제작하거나, 크라우드 펀딩 등의 방법으로만 자금을 조달하여 제작된 게임.
					</p>
					<?php
						}else if($check == 2)
						{
					?>
						<p style="clear: both; font-size: 12px; position: relative; top: 10%;">매뉴얼과 게임 CD, 좀 더 오래된 거라면 플로피 디스크나 롬 카트리지, 최신이라면 <br>
						DVD/BD, 게임카드,[1] 때로는 암호표나 그 밖에 서비스로 주는 그런 걸 패키지에 넣어<br>
						 둔 게임. 한국에서만 쓰이는 콩글리시이며 해외에서는 포장 박스인 패키지로 구분하지 <br>
						 않고 저장 매체가 어떤 형태냐로 구분하여 하드 카피(Hard Copy), 물리 디스크(Physical<br>
						  Disc)라고 한다. 그 반대로 온라인으로 다운로드 받은 게임은 디지털 카피(Digital Copy)라고
						   한다.
					</p>
					<?php
						}else if($check == 3)
						{
					?>
						<p style="clear: both; font-size: 12px; position: relative; top: 10%;">SCE(현 SIE)에서 개발한 8세대 거치형 게임기로 <br>플레이스테이션 3의 후속 기종이다. 경쟁 기기는 타사의<br> 8세대 거치기인 엑스박스 원과 Wii U 그리고 완전한 거치형 <br>게임기는 아니지만 Wii U를 대체해 출시한 닌텐도 <br>스위치이다. 사용자들이 붙여 준 약칭은 플스4, 플4, <br>PS4등이 있다.
					</p>
					<?php
						}else{
					?>
						<p style="clear: both; font-size: 12px; position: relative; top: 10%;">닌텐도에서 제작한 가정용 게임기로, '혁신'이라는 단어를 논할 때 가장 먼저 떠올리게<BR> 되는 게임 콘솔[1]. 게임큐브의 후속 기종에 해당된다. 후속 기종으로는 Wii U가 있다.<BR>
닌텐도 게임큐브의 후속 기종으로 출시된 가정용 게임기로, E3 2005에서 공개 되고<br>2006년 11월 19일 미국에서 선출시 되었다. 플레이스테이션 3, 엑스박스 360과<br>경쟁했으며 모션 센서가 적용된 "체감형" 컨트롤러와 독창적인 액세서리를 마케팅<br>포인트로 잡아 대박을 터뜨리며 당대 콘솔 시장의 승자로 자리 매김했다
					</p>
					<?php
						}
					?>
				</div>
			<div class="new_slide">
				<div class="new_slide_wrap">
					<?php
							$i = 0;
							$tt = 1;
							$num = 0;
							$sql = "select * from ".$table." where division = '".$num."'";
							$result = mysqli_query($con,$sql);
							while($row = mysqli_fetch_assoc($result))
							{
								if($i == 9)
								{
									break;
								}
							?>
								<div class="img_div">
										<?php 
											if(isset($_SESSION['userid']))
											{

										?>
										<a href="./thirdindex.php?mode=click&bno=<?php echo $row['num']?>&title=<?php echo $check?>">
											<img src="<?php echo $row['img1']?>" alt='img' class='curimg'>
										</a>
										<?php
											}else{
										?>
											<a href="#" class="slide_img">
											<img src="<?php echo $row['img1']?>" alt='img' class='curimg'>
										</a>
										<?php
											}
										?>
								</div>

								<?php
								$i++;
							}
						?>
					<!-- <div class="img_div">
						<a href="#">
							<img src="webimg/inde/1.jpg" alt='img' class='curimg'>
						</a>
					</div>

					<div class="img_div">
						<a href="#">
							<img src="webimg/inde/2.jpg" alt='img' class='curimg'>
						</a>
					</div>

					<div class="img_div">
						<a href="#">
							<img src="webimg/inde/3.jpg" alt='img' class='curimg'>
						</a>
					</div>

					<div class="img_div">
						<a href="#">
							<img src="webimg/inde/4.jpg" alt='img' class='curimg'>
						</a>
					</div>

					<div class="img_div">
						<a href="#">
							<img src="webimg/inde/5.jpg" alt='img' class='curimg'>
						</a>
					</div> -->
				</div>
			</div>
				<div>
					<div id="section_div">
						<div class="top_wrap">
							<br>
							<?php
									if($check == 1)
									{
										echo "<h1 style='color:white; margin-left: 30px; font-size: 38px;'>인디게임</h1>";
									}else if($check == 2)
									{
										echo "<h1 style='color:white; margin-left: 30px; font-size: 38px;'>PC</h1>";
									}else if($check == 3)
									{
										echo "<h1 style='color:white; margin-left: 30px; font-size: 38px;'>PS4</h1>";
									}else{
										echo "<h1 style='color:white; margin-left: 30px; font-size: 38px;'>WII</h1>";
									}
							?>
							
						</div>
						<div class="top_wrap">
							<nav class="top_nav">
								<ul class="tap_menu">
									<li style="color: white;">전략시뮬레이션
									</li>
									<li style="color: white;">시뮬레이션</li>
									<li style="color: white;">샌드박스</li>
									<li style="color: white;">모험</li>
								</ul>
							</nav>
						</div>
					</div>
					<div style="height:auto;">
						<div class="tap1" style="height: auto;">
							<div class="tap_wrap" style="overflow: auto; width: 100%; box-sizing: border-box; padding: 10px; padding-right: 0px;" id="one_delay">
								<?php
									$i = 0;
									$tt = 1;
									$dnum = 1;
									$sql = "select * from ".$table." where division = '".$dnum."'";
									$result = mysqli_query($con,$sql);
									while($row = mysqli_fetch_assoc($result))
									{
										?>
										<div class="new_img_div">
											<img src="<?php echo $row['img1']?>" alt='img'>
											<div class="fi_black">
												<?php
													if(isset($_SESSION['userid']))
													{
												?>
												<a href="./thirdindex.php?mode=click&bno=<?php echo $row['num']?>&title=<?php echo $check?>" class="b_button">
													<p style="color: white;" class="b_p">더 알아보기</p>
													</a>
													<?php
													}else{
														?>
														<a href="#" class="b_button a_btn">
															<p style="color: white;" class="b_p">더 알아보기</p>
														</a>
														<?php
													}
													?>
											</div>
										</div>
									<?php
									}
								?>  
							</div>
						</div>
						<div class="tap2" style="height: auto;">
							<div class="tap_wrap" style="overflow: auto; width: 100%; box-sizing: border-box; padding: 10px; padding-right: 0px;" id="two_delay">  

								<?php
									$i = 0;
									$tt = 1;
									$dnum = 2;
									$sql = "select * from ".$table." where division = '".$dnum."'";
									$result = mysqli_query($con,$sql);
									while($row = mysqli_fetch_assoc($result))
									{
										?>
										<div class="new_img_div">
											<img src="<?php echo $row['img1']?>" alt='img'>
											<div class="fi_black">
												<?php
													if(isset($_SESSION['userid']))
													{
												?>
												<a href="./thirdindex.php?mode=click&bno=<?php echo $row['num']?>&title=<?php echo $check?>" class="b_button">
													<p style="color: white;" class="b_p">더 알아보기</p>
													</a>
													<?php
													}else{
														?>
														<a href="#" class="b_button a_btn">
															<p style="color: white;" class="b_p">더 알아보기</p>
														</a>
														<?php
													}
													?>
											</div>
										</div>
									<?php
									$i++;
									}
								?>

							</div>
						</div>
						<div class="tap3" style="height: auto;">
									<div class="tap_wrap" style="overflow: auto; width: 100%; box-sizing: border-box; padding: 10px; padding-right: 0px;" id="three_delay">
										<?php
												$i = 0;
												$tt = 1;
												$dnum = 3;
												$sql = "select * from ".$table." where division = '".$dnum."'";
												$result = mysqli_query($con,$sql);
												while($row = mysqli_fetch_assoc($result))
												{
													?>
													<div class="new_img_div">
														<img src="<?php echo $row['img1']?>" alt='img'>
														<div class="fi_black">
															<?php
													if(isset($_SESSION['userid']))
													{
												?>
												<a href="./thirdindex.php?mode=click&bno=<?php echo $row['num']?>&title=<?php echo $check?>" class="b_button">
													<p style="color: white;" class="b_p">더 알아보기</p>
													</a>
													<?php
													}else{
														?>
														<a href="#" class="b_button a_btn">
															<p style="color: white;" class="b_p">더 알아보기</p>
														</a>
														<?php
													}
													?>
														</div>
													</div>
												<?php
												$i++;
												}
											?>
										</div>
						</div>
						<div class="tap4" style="height: auto;"> 
								<div class="tap_wrap" style="overflow: auto; width: 100%; box-sizing: border-box; padding: 10px; padding-right: 0px;" id="for_delay">
										<?php
												$i = 0;
												$tt = 1;
												$dnum = 4;
												$sql = "select * from ".$table." where division = '".$dnum."'";
												$result = mysqli_query($con,$sql);
												while($row = mysqli_fetch_assoc($result))
												{
													?>
													<div class="new_img_div">
														<img src="<?php echo $row['img1']?>" alt='img'>
														<div class="fi_black">
															<?php
													if(isset($_SESSION['userid']))
													{
												?>
												<a href="./thirdindex.php?mode=click&bno=<?php echo $row['num']?>&title=<?php echo $check?>" class="b_button">
													<p style="color: white;" class="b_p">더 알아보기</p>
													</a>
													<?php
													}else{
														?>
														<a href="#" class="b_button a_btn">
															<p style="color: white;" class="b_p">더 알아보기</p>
														</a>
														<?php
													}
													?>
														</div>
													</div>
												<?php
												$i++;
												}
											?>
										</div>
						</div>
						
					</div>
					<footer>
					<p style="color: white; font-size: 16px; margin-left: 5%; position: relative; top: 20%;">Pixcel 대표 dep   주소 : 한국폴리텍대학교 제주캠퍼스 융합디자인학과   전화 : 1111-0000<br>
E-MAIL : tlswpwnchemd@naver.com   <br>
©2018 NEXON Korea Corporation All Rights Reserved.
</p>
				</footer>
				</div>	
				
		</div>
	</div>
</body>
<!-- <script type="text/javascript" src="script/jquery-1.12.3.js"></script> -->
<script type="text/javascript" src="libs/slick/slick/slick.js"></script>

<script type="text/javascript" src="script/script.js">

	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".a_btn").click(function(e){
				e.preventDefault();
				var txt=  "로그인 해주세요.";
			popWindow.dialog(txt, popWindow.dialog.typeEnum.error,{
				onOk:function(){
       	   						// location.reload();
       	   						$("#modal_login").show();
	 							$('.loginid').focus();
       	   		}
			});
				
			});








			$(".slide_img").click(function(){
				var txt = "로그인 해주세요.";
				popWindow.dialog(txt,popWindow.dialog.typeEnum.error,{
					onOk:function(){
						$("#modal_login").show();
						$(".loginid").focus();
					}
				});
			});
		});
	</script>
</html>