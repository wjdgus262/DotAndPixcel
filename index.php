<?php
	include("header.php");
	include("dbcon.php");
	// session_cache_expire(1);
	error_reporting(0);
// $con = mysqli_connect("localhost","root","","web_pe");
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Dap</title>
	
	<script type="text/javascript" src="script/jquery-3.3.1.js"></script>
		<link type="text/css" rel="stylesheet" href="autocom/jquery.autocomplete.css" /> 

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
<script type="text/javascript">
	setInterval(function(){
			$("#r_top").load('./snoopy/rank.php');
		},500);
</script>



	<link rel="stylesheet" type="text/css" href="libs/slick/slick/slick-theme.css">
	 <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  
	<link rel="stylesheet" type="text/css" href="libs/slick/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="style/header.css">
	<link rel="stylesheet" type="text/css" href="style/indexstyle.css">
	<style type="text/css">

	</style>
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
</style>
</head>
<body>
	<div id="all" style="width: 100%; height: 100%; position: relative;">

		<div id="front">
			<div id="info">
				<ul id="infoslide">
					<li>
						<h1>인디게임</h1>
						<p>소형 개발사에서 대형 기획사나 게임 회사에서의 지원을 받지 않고, 스스로의 힘으로 제작하거나,<br>크라우드 펀딩 등의 방법으로만 자금을 조달하여 제작된 게임.</p>
					</li>
					<li>
						<h1>PC</h1>
						<p>매뉴얼과 게임 CD, 좀 더 오래된 거라면 플로피 디스크나 롬 카트리지, 최신이라면 DVD/BD, 게임카드,[1] 때로는 <br>암호표나 그 밖에 서비스로 주는 그런 걸 패키지에 넣어 둔 게임.</p>
					</li>
					<li>
						<h1>PS4</h1>
						<p>게임은 실제로 플레이어가 직접 그 게임의 내부 세계에 참여하고 그 형태를 조작할 수 있다.<br>가령 팩맨에서 특정 아이템을 얻으면 자신을 없애려고 하는 유령들을 제거할 수 있다.</p>
					</li>
					<li>
						<h1>WII</h1>
						<p>닌텐도에서 제작한 가정용 게임기로, '혁신'이라는 단어를 논할 때 가장 먼저 떠올리게 되는 게임 콘솔[1].<br>게임큐브의 후속 기종에 해당된다. 후속 기종으로는 Wii U가 있다</p>
					</li>

				</ul>
			</div>
			<div id="layer1">
				<img src="indeximg/Layer_1.png" alt="img1">
			</div>
			<div id="layer2">
				<p style="color:white; font-size: 12px; position: absolute; top: 30%; margin-left: 20%;">Don And Pixcel 대표 dep   주소 : 한국폴리텍대학교 제주캠퍼스 융합디자인학과   전화 : 1111-0000<br>
E-MAIL : tlswpwnchemd@naver.com   <br>
©2018 NEXON Korea Corporation All Rights Reserved.
</p>
				<img src="indeximg/Layer_2.png" alt="img1">
			</div>
			<div id="layer3">
				<img src="indeximg/Layer_3_1.png" alt="img1">
			</div>
			<div id="layer4">
				<img src="indeximg/Layer_4.png" alt="img1">
				<div id="buttonclick">
						<ul class="slidectrl">
    						<li class="slidepos">
       							 <button type="button" id="bt1" class="check"></button>
      							 <button type="button" id="bt2" class="check"></button>
       							 <button type="button" class="check" id="bt3"></button>
        						<button type="button" class="check" id="bt4"></button>
    						</li>
						</ul>
					</div>
			</div>
			<div id="layer5">
				<img src="indeximg/Layer_5.png" alt="img1">
				<div id="mainlogin">
					<p><a href="#" id="login"></a></p>
				</div>
				<div id="noticelogin">
					<p class="notice">공지사항</p>
				</div>
			</div>
		</div>
			<div class="slidebox">
    			<ul class="slide">
        			<li style="">
						<video  autoplay class="video" id="video1">
							<source src="./video/video1.mp4" type="video/mp4">
						</video>
        			</li>
       				 <li style="">
        				<video   class="video" id="video2">
							<source src="./video/video2.mp4" type="video/mp4">
						</video>
        			</li>
        			<li style="">
        				<video  class="video" id="video3"y>
							<source src="./video/video3.mp4" type="video/mp4">
						</video>
       				 </li>
       				 <li >
        				<video  class="video" id="video4">
							<source src="./video/video4.mp4" type="video/mp4">
						</video>
        			</li>
 
    			</ul>
    			<div id="slidebutton">
	
				</div>
					
			</div>
			<div id="aaaa">
				<div id="r_top">

				</div>
				<div id="t_bottom">
					<div class="twrap">
						<?php
							$count = 0;
							$sql = "select * from inde";
							$result = mysqli_query($con,$sql);
							while($row = mysqli_fetch_array($result))
							{
								if($count == 2)
								{
									break;
								}
								if(isset($_SESSION['userid']))
								{

								?>
								<div class="div_black">
									<div class="black">
										<div class="i_bt">
											<a href="./thirdindex.php?mode=click&bno=<?php echo $row['num']?>&title=1">더알아보기</a>
										</div>
									</div>
									<img src="<?php echo $row['img1']?>" alt="1">
								</div>
								<?php
								}else{
									?>
									<div class="div_black">
									<div class="black">
										<div class="i_bt">
											<a href="./thirdindex.php?mode=click&bno=<?php echo $row['num']?>&title=1" class='mo_btn'>더알아보기</a>
										</div>
									</div>
									<img src="<?php echo $row['img1']?>" alt="1">
								</div>
									<?php
								}
								$count++;
							}
						?>
					</div>
				</div>
			</div>

	</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$(".notice").click(function(){
			var windowW = 1200;
			var heightH = 800;
			var left = Math.ceil((window.screen.width - windowW)/2);
			var top = Math.ceil((window.screen.height - heightH)/2);
			window.open("./notice.php","네이버새창","width="+windowW+",height="+heightH+",left="+left+", top="+top);
		});
	$("#video1").on("ended",function(){
		sliding(1);
		testslideing(1);
	});
	$("#video2").on("ended",function(){
		sliding(1);
		testslideing(1);
	});
	$("#video3").on("ended",function(){
		sliding(1);
		testslideing(1);

	});
	$("#video4").on("ended",function(){
		sliding(1);
		testslideing(4);
	});
	// alert("aa");
	var idx = 0;
	var slidemax = 3;
	        // var he = $(".slide").height();
        // alert("he");
	var pos = 0;

	var tidx = 0;
	var tslidemax = 3;
	var tpos = 290;
	// $(".black").hide();
	function testslideing(add)
	{
		tpos = $("#infoslide").width() / 4;
		tidx = tidx + add;
		if(tidx < 0) tidx = tslidemax;
		else if(tidx > tslidemax) tidx = 0;
		$("#infoslide").stop().animate({'left':-(tidx*300)+"px"},"slow");
	}

	// $(".div_black").mouseover(function(){
	// 	$(this).children(".black").show(400);
	// });
	// $(".div_black").mouseleave(function(){
	// 	$(this).children(".black").hide();
	// });

$("#bt1").addClass("aa");
	function sliding(add)
	{
		
		pos = $(".slide").width() / 4;
		var vid1 = document.getElementById('video1');
		var vid2 = document.getElementById('video2');
		var vid3 = document.getElementById('video3');
		var vid4 = document.getElementById('video4');
		// var video1 = $("#video1");
		// var video2 = $("#video2");
		// var video3 = $("#video3");
		// var video4 = $("#video4");
		idx = idx + add;
		if(idx < 0) idx = slidemax;
		else if(idx > slidemax) idx = 0;
		$(".slide").stop().animate({'left':-(idx*pos)+"px"},"slow");


		



		if(idx == 0)
		{
			
			$(".check").removeClass("aa");
			$("#bt1").addClass("aa");
			vid1.play();
			vid2.pause();
			vid3.pause();
			vid4.pause();
			// video2[0].pause();
			// video3[0].pause();
			// video4[0].pause();
			// video1[0].play();
		}else if(idx == 1){
			$(".check").removeClass("aa");
			$("#bt2").addClass("aa");
			vid2.play();
			vid1.pause();
			vid3.pause();
			vid4.pause();
			// video1[0].pause();
			// video2[0].pause();
			// video3[0].pause();
			// video2[0].play();
			
		}else if(idx == 2)
		{
			$(".check").removeClass("aa");
			$("#bt3").addClass("aa");
			// video1[0].pause();
			// video2[0].pause();
			// video4[0].pause();
			// video3[0].play();
			vid3.play();
			vid1.pause();
			vid2.pause();
			vid4.pause();
		}else if(idx == 3)
		{
			$(".check").removeClass("aa");
			$("#bt4").addClass("aa");
			// video1[0].pause();
			// video2[0].pause();
			// video3[0].pause();
			// video4[0].play();
			vid4.play();
			vid1.pause();
			vid2.pause();
			vid3.pause();
		}
	}
// autoslide = setInterval(function() { sliding(1) }, 7000);
// autotextslide = setInterval(function() { testslideing(1) }, 7000);
	// function after() {
 //        setTimeout(function() {
 //            // clearInterval(autoslide);  
 //            autoslide = setInterval(function() { sliding(1) }, 7000);
 //        }, 7000);
 //    }
     
    $('#leftbtn, #rightbtn').click(function() {
        // clearInterval(autoslide);  

        if($(this).attr('id') == "leftbtn") sliding(-1);
        else sliding(1);
        // after();
    });
    $('.slidepos > button').click(function() {
        // clearInterval(autoslide);  
        idx = $(this).index();
        tidx = $(this).index();  
        sliding(0);
        testslideing(0);
    });
    $("#login").click(function(){
    		  var windowW = 500;  // 창의 가로 길이
        var windowH = 676;  // 창의 세로 길이
		var left = Math.ceil((window.screen.width - windowW)/2);
        var top = Math.ceil((window.screen.height - windowH)/2);
		window.open("login_popup.php","pop_01","l top="+top+", left="+left+", height="+windowH+", width="+windowW);
    });	
	});

	var headerwid = $("header").width();
	var frontwidth = $("#front").width();
	$('#remo').css('left', (headerwid+frontwidth)-18+"px");


	$(".mo_btn").click(function(e){
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

</script>
</html>