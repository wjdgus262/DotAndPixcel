<link rel="stylesheet" type="text/css" href="style/popWindow.css">
	<script type="text/javascript" src="script/jquery-3.3.1.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
	<script src="js/popWindow.js" type="text/javascript" charset="utf-8"></script>
<?php
	include("header.php");
	include("dbcon.php");
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
					$bno = $row['num'];
					$check = 2;
				}
		}else{
			$location = $row['location'];
			$db_name = $row['name'];
			$img1 = $row['img1'];
			$img2 = $row['img2'];
			$img3 = $row['img3'];
			$check = 1;
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
	$bno1 = $bno;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dap</title>
			 <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  	<link rel="stylesheet" type="text/css" href="libs/slick/slick/slick-theme.css">
  	
	 <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  
	<link rel="stylesheet" type="text/css" href="libs/slick/slick/slick.css">

		<link rel="stylesheet" type="text/css" href="style/header.css">

	<link rel="stylesheet" type="text/css" href="style/thirdindex.css">
	<style type="text/css">




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
	<div id="all">
		<div class="con">
			<div class="con_wrap">
				<div class="con_top">
					<br>
					<br>
					<!-- <p style="font-size: 1px; color: #1B242B;" id="title"><?php echo $check?></p>
					<p style="font-size: 1px; color: #1B242B;" id="bno"><?php echo $bno1?></p> -->
					<?php
						// $sql = "select * from '".$table."'where num = ".$bno."";
						// $sql = "SELECT * FROM $table where num = $bno";
						// $result = mysqli_query($con,$sql);
						// $row =mysqli_fetch_assoc($result);

							echo "<p style='font-size: 18px;'>".$location."</p>";
							echo "<h1 style='font-size: 40px;''>".$db_name."</h1>";

					?>
					<!-- <p style="font-size: 18px;"><?php $row['location']?></p>
					<h1 style="font-size: 40px;"><?php $row['name']?></h1>
				 -->
				</div>
				<div class="con_ar">
					<div class="left">
						<div class="slide_wrap">

							<div class="img_wrap">
								<img src="<?php echo $img1?>" alt="12" >
							</div>
							<div class="img_wrap">
								<img src="<?php echo $img2?>" alt="12">
							</div>
							<div class="img_wrap">
								<img src="<?php echo $img3?>" alt="12">
							</div>
						</div>	
						<div class="bottom">
						</div>
					</div>
					<div class="right">
						<div class="right_top">
						</div>
						<div class="right_bottom">
						</div>
					</div>	
				</div>
				<div class="info">
					<div class="top_left">
						<p style="color: white; font-size: 22px; margin-top: 30px;">개발자 2명의 리뷰<br>
베리 멜론 : 이 게임은 여러가지를 포함하고 있는 게임입니다.<br>
여러가지를 즐길 수 있으며, 신선한 도트를 느낄 수 있습니다.<br><br>

빡종갓 : 모험을 즐기는 신선한 기분을 느낄 수 있습니다.<br>
아기 자기한 모형이 매우 귀엽더군요.</p>
					</div>
					<div class="top_rigth" >
						<p style="color: white; font-size: 22px; margin-left: 40px; margin-top: 30px;">
							싱글 플레이어<br>
멀티 플레이어<br>
온라인 멀티 플레이어<br>
협동<br>
온라인 협동<br>
컨트롤러 완벽 지원<br>
스팀 제품<br>
						</p>
					</div>
					<div class="bottom_left">
						<h3>시스템 사양</h3>
						<hr>
						<p>
							최소:<br>
64비트 프로세서와 운영 체제가 필요합니다<br>
운영체제: Windows 7 64 Bit<br>
프로세서: 2.4 GHz Dual Core<br>
메모리: 6 GB RAM<br>
그래픽: NVIDIA GeForce GTX 460 or AMD Radeon HD 5770 /w 1GB VRAM<br>
DirectX: 버전 11<br>
네트워크: 초고속 인터넷 연결<br>
저장공간: 3 GB 사용 가능 공간<br>
						</p>
						<p>권장:<br>
64비트 프로세서와 운영 체제가 필요합니다<br>
운영체제: Windows 10 64 Bit<br>
프로세서: 2.4 GHz Quad Core<br>
메모리: 8 GB RAM<br>
그래픽: 1 GB NVIDIA 970 / AMD Radeon 290<br>
DirectX: 버전 11<br>
네트워크: 초고속 인터넷 연결<br>
저장공간: 3 GB 사용 가능 공간<br>
						</p>
					</div>
					<div class="bottom_rigth">
						<h3>언어지원</h3>
						<hr>
						<p>
							한국어<br>
일본어<br>
영어<br>
중국어<br>
스페인어<br>
여러나라...
						</p>
					</div> 
				</div>
				<div class="conmat">
					<div id="input">
						<textarea name="contnet" cols="40" rows="8" placeholder="댓글을 입력해주세요" class="textarea"></textarea>
						<button id="comant_input">입력</button>
					</div>
					
					<div style="width: 700px; height: 500px;">
						
					</div>
				</div>
		</div>

	</div>
		<div class="right1">
			<a href="https://www.youtube.com/"><img src="img/icon/you.png" alt="you"></a>
			<a href="https://www.youtube.com/user/mkvidio"><img src="img/icon/kim.png" alt="you"></a>
			<a href="https://www.youtube.com/user/khan0925"><img src="img/icon/ma.png" alt="you"></a>
			<a href="https://www.youtube.com/channel/UCMru5gvumXqykoro-yDwQCw"><img src="img/icon/nut.png" alt="you"></a>
			<a href="https://www.youtube.com/"><img src="img/icon/taco.png" alt="you"></a>

		</div>
		<footer></footer>
	</div>
</body>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="libs/slick/slick/slick.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$('.slide_wrap').slick({
		});
	});
	$(window).resize(function(){
		var width = parseInt($(this).width());
		if(width < 1500)
		{
			$(".slick-next").css("left","40%");
		}else if(width > 1500)
		{
			$(".slick-next").css("left","50%");
		}
	});

	$("#comant_input").click(function () {
 
        // if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
       	//     alert("aa");
       	    
        // }
        conmat();
    });

	function conmat(){
		var text = $(".textarea").val();
		var title = $("#title").text();
		var bno = $("#bno").text();
		if(text == '')
		{
			var txt=  "내용을 입력해주세요.";
			popWindow.dialog(txt, popWindow.dialog.typeEnum.error)
		}else{
			// alert(title+"   "+bno);
			// $.ajax({
			// 	type:"POST",
			// 	url:"comant.php",
			// 	data:"title="+<?php echo $check;?>+"&bno="+<?php echo $bno?>,
			// 	success:function(data)
			// 	{

			// 	}
			// });
			$.ajax({
				type:"POST",
				url:"./comant.php",
				data:"title="+<?php echo $check;?>+"&bno="+<?php echo $bno?>+"&text="+text,
				success:function(data){
					alert("댓글 입력 성공");
					location.reload();
				}
			});
		}
	}
</script>
</html>