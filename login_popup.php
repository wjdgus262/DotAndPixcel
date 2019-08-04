<?php
	include("dbcon.php");
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
	<script type="text/javascript" src="script/jquery-1.12.3.js"></script>
	
	<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
	<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		text-decoration: none;
		list-style: none;
	}
		body{
			overflow:hidden;
			min-width: 500px;
		}
		#popup{
			width: 100%;
			height: 100%;
		}
		header{
			width: 500px;
			height: 75px;
			/*background-color: blue;*/
		}
		nav{
			width: 500px;
			height: 75px;
			/*background-color: red;*/
		}
		ul{
			width: 250px;
			height: inherit;
			margin-left: 10px;
		}
		ul > li{
			float: left;
			font-size: 18px;
			margin-top: 30px;
			margin-left: 20px;
			cursor: pointer;
		}
		#center{
			width: 500px;
			height: 325px;
			/*background: red;*/
			position: relative;
		}
		.form_div
		{
			width: 450px;
			height: 400px;
			/*background: blue;*/
			left: 25px;
			top: 50px;
			position: absolute;
		}
		.inpt{
			width: 441px;
			height: 50px;
			border: 2px solid #D26434;
			margin-top: 0px;
			padding-left: 5px;
			font-size: 20px;
		}
		.aa{
			border-bottom: none;
		}
		.submit{
			width: 450px;
			height: 50px;
			background: #D26434;
			color: white;
			border: none;
			margin-top: 15px;
			cursor: pointer;
		}
		.
		
		.line{
			width: 180px;
			height: 2px;
			background: black;
			float: left;
			margin-top: 20px;
		}
		
		.info{
			float: left;
			margin-left: 26px;
			font-size: 18px;
			margin-top: 10px;
		}
		footer{
			width: inherit;
			height: 100px;
			background: #ECEEEF;
			position: relative;
		}
		.ff{
			top: 20px;
			left: 10px;
			position: absolute;
			font-size: 12px;
		} 
		.li_after{
		width: 65px;
		height: 10px;
		position: absolute;
		background-color: #E76A2F;
		left: 27px;
		top: 20px;
		opacity: 0;
		}
		.li_after1{
		width: 100px;
		height: 10px;
		position: absolute;
		background-color: #E76A2F;
		left: 100px;
		top: 20px;
		opacity: 0;
		}
	</style>
</head>
<body>
	<div id="popup">
		<header id="top">
			<nav>
				<ul class="menu">
					<li class="la1">로그인
						<!-- <div class='li_after'></div> -->
					</li>
					<li class="re1">계정만들기
					<!-- <div class='li_after1'></div> --></li>
				</ul>
			</nav>
		</header>
		<hr>
		<div id="center">
			<div class="form_div">
				<form action="login_check.php" method="POST">
					<input type="text" name="id" placeholder="ID" class="inpt aa"><br>
					<input type="password" name="pw" placeholder="PW" class="inpt" ><br>
					<input type="submit" name="submit" value="로그인" class="submit">
				</form>
<!-- 				<div class="line">
				</div>
				<p class="info">또는</p>
				<div class="line" style="margin-left: 26px;">
				</div>
				<br>
				 <a id="kakao-login-btn"></a>
  <a href="http://developers.kakao.com/logout"></a> -->
  				<!-- <button id="logout">로그아웃</button> -->
			</div>
		
		</div>
		<footer>
			<p align="center" class="ff">©2018 BLIZZARD ENTERTAINMENT, INC. 모든 권리는 BLIZZARD <br>ENTERTAINMENT에 있습니다.<br>
사업자 등록 번호: 211-87-49910 | 통신 판매업 신고 번호: 강남-6017호 | 사업자정보확인<br>
대표이사: 마이클 모하임, 전동진 | 개인정보 보호책임자: 전동진 대표이사</p>
		</footer>

	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$(".la1").append("<div class='li_after'></div>");
		$(".li_after").animate({
				opacity:'1',
				top:60
			},300)


		$(".la1").click(function(){
			$(".li_after1").remove();
			$(this).append("<div class='li_after'></div>");
			$(".li_after").animate({
				opacity:'1',
				top:60
			},300)
		});
		$(".re1").click(function(){
			$(".li_after").remove();
			$(this).append("<div class='li_after1'></div>");
			$(".li_after1").animate({
				opacity:'1',
				top:60
			},300)
		});
	});
</script>
<script type='text/javascript'>
    //<![CDATA[
   // 사용할 앱의 JavaScript 키를 설정해 주세요.
   Kakao.init('06d305a29b7634aabe394d6340ff0e4c');
   
   // 카카오 로그인 버튼을 생성합니다.
   Kakao.Auth.createLoginButton({
     container: '#kakao-login-btn',
     success: function(authObj) {
    // alert(JSON.stringify(authObj));
    	Kakao.API.request({
    		url:'/v1/user/me',
    		success:function(res)
    		{
    			var nickname = res.properties.nickname
    			alert(res.properties.nickname+"환영합니다.");
    			window.close();
    			// window.location.href ="index.php?nick="+nickname;
    			opener.location.href = "index.php?nick="+nickname;
    		}
    	});
     },
     fail: function(err) {
     alert(JSON.stringify(err));
     }
   });http://localhost/web/indeximg/Layer_5.png
    //
    $("#logout").click(function(){
    	Kakao.Auth.logout(function(){
    		// setTimeout(function(){
    		// 	alert("로그아웃성공")
    		// },1000);
    		console.log("logged out");
    	});
    });
  </script>
</html>