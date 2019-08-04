<?php
	include("dbcon.php");
	error_reporting(0);
	// session_cache_expire(1);
	session_start();

	// echo "<script>alert('".$_SESSION['userid']."')</script>";
?>

<html>
<head>
	<script type="text/javascript" src="script/jquery-3.3.1.js"></script>
		<link type="text/css" rel="stylesheet" href="autocom/jquery.autocomplete.css" />                  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="autocom/jquery.autocomplete.js"></script>
<script type="text/javascript" src="array/array.js">
</script>
<script type="text/javascript">
$(function() {
	$("#search").autocomplete({
		source:[states]
	}); 
	$("#search1").autocomplete({
		source:[states]
	});
});
</script>
<?php
	if(isset($_SESSION['userid']))
	{


?>
<script type="text/javascript">
	var LogOutTimer = function(){
			var S = {
				timer:null,
				limit : 1000 * 60 * 1,
				fnc : function(){},
				fnc1: function(){}
				,
				start: function(){
					S.timer = window.setTimeout(S.fnc,S.limit);
				},
				reset:function(){
					window.clearTimeout(S.timer);
					S.start();
				},
				more:function(){
					S.timer = window.setTimeout(S.fnc1,S.limit / 2);
				}
			};
			document.onmousemove = function(){S.reset();};

			return S;
		}();
		var tt = 30;
		LogOutTimer.limit = 1000 * 60 * 1;
		// LogOutTimer.fnc1 = function(){
		// 	alert("30초후 로그아웃 됩니다.");
		// 	setInterval(hello,1000);
		// }
		// var hello = function() {
  //           alert(tt);
  //           tt = tt-1;
  //       }


		LogOutTimer.fnc = function(){
			$.ajax({
				type:"POST",
				url:"./logout.php",
				success:function(response){
					var txt = "5분간 아무런 동작이 없어 <br> 로그아웃 되었습니다.";
       	   				popWindow.dialog(txt,popWindow.dialog.typeEnum.success,{
       	   					onOk:function(){
       	   						location.reload();
       	   					}
       	   				});

				}
			});
		}

		LogOutTimer.start();
		// LogOutTimer.more();

</script>
<?php
	}else{

	}
?>


	<!-- <script type="text/javascript" src="script/jquery-3.3.1.js"></script> -->


	<link rel="stylesheet" type="text/css" href="style/popWindow.css">
	
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
	<script src="js/popWindow.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="style/header.css">
	<link rel="stylesheet" type="text/css" href="style/find.css">



	<script type="text/javascript" src="script/header_script.js">
	</script>
	<!-- <script type="text/javascript" src="script/new_header_script.js"></script> -->
<script type="text/javascript" src="script/find.js">
	</script>
	<style type="text/css">
		.all_pp{
			color: #85878C;
		}
	</style>
</head>
<body>
<!-- 로그인 -->

<div id="modal_login">
	<div id="login_wrap">
		<div class="top_bottom">
			<div class="title">
				<p>DAP AND PIXEL GAMES</p>
			</div>
			<div class="close">
				<img src="header_img/close.png" alt="close">
			</div>
		</div>
		<div class="center">
			<div class="center_top">
				<p>Login to your account</p>
			</div>
			<div class="center_ar">
				<form action="login_check.php" method="POST" class="form" id="login_form">
					<div class="id_form_wrap id_form_wrap_id">
						<div class="id_wrap_icon">
							<img src="header_img/id_icon.png" alt="icon" class="person_i">
						</div>
						<div class="id_wrap_input">
						<input type="text" name="id" class="id_wrap_inputid newid" placeholder="identification - ID" autocomplete="off">
						</div>
						<div class="id_wrap_info">
						</div>
					</div>
					<div class="id_form_wrap id_pw_form">
						<div class="id_wrap_icon">
							<img src="header_img/id_pw_icon.png" alt="icon" class="per_pw_i">
						</div>
						<div class="id_wrap_input">
							<!-- <input type="text" name="id" class="input loginid" autocomplete="off"> --><input type="password" name="id" class="id_wrap_inputid newpw" placeholder="Password " autocomplete="off">
						</div>
						<div class="id_wrap_info">

						</div>
					</div>
				</form>
				<div class="id_center_btn">
					<div class="id_center_btn_wrap">
							<button type="button" class="submit login_btn1">Login</button>
					</div>
					<div class="id_center_btn_wrap">
							<button type="button" class="cancel submit1 login_cancel">Cancel</button>
					</div>
				</div>
				<div class="find_div_login">
					<div class="find_div_login_wrap">
						<p class="go_find_id">Find Id</p>
					</div>
					<div class="find_div_login_wrap find_pw_div">
						<p class="go_find_pw">Find Password</p>
					</div>
				</div>
				<div class="login_info_div">
					<p class="all_pp">In consideration of the person named below (hereinafter referred to as “participant”) being allowed to take part as a participant or volunteer counselor in 2009 </p>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- 회원가입 -->
<div id="register_modal">
	<div id="register_wrap">
		<div class="top_bottom">
			<div class="title">
				<p>DAP AND PIXEL GAMES</p>
			</div>
			<div class="close">
				<img src="header_img/close.png" alt="close">
			</div>
		</div>
		<div class="register_center">
			<div class="register_center_top">
				<p>Change Password?</p>
			</div>
			<div class="register_center_center">
				<form class="re_gei_form">
				<div class="register_center_wrap regi_id_wrap">
					<div class="regi_icon">
							<img src="header_img/id_icon.png" alt="icon" class="regi_id_icon re_icon">
					</div>
					<div class="regi_input">
						<input type="text" name="id" class="input regi_id" placeholder="Dot and Pirxel ID" autocomplete="off">
					</div>
					<div class="regi_info">
						<p class="id_info_re"></p>
					</div>
				</div>

				<div class="register_center_wrap regi_pw_wrap">
					<div class="regi_icon">
							<img src="header_img/re_pw_icon.png" alt="icon" class="regi_pw_icon re_icon">
					</div>
					<div class="regi_input">
						<input type="password" name="id" class="input regi_pw" placeholder="Change password" autocomplete="off">
					</div>
					<div class="regi_info">
						<p class="pw_info_re"></p>
					</div>
				</div>

				<div class="register_center_wrap regi_pw_ch">
					<div class="regi_icon">
							<img src="header_img/re_pw_icon.png" alt="icon" class="regi_pw_ch_icon re_icon">
					</div>
					<div class="regi_input">
						<input type="password" name="id" class="input regi_pw_ch_input" placeholder="Confirm password" autocomplete="off">
					</div>
					<div class="regi_info">
						<p class="pwch_info_re"></p>
					</div>
				</div>

				<div class="register_center_wrap regi_nick_wrap">
					<div class="regi_icon">
							<img src="header_img/id_icon.png" alt="icon" class="regi_nick_icon re_icon">
					</div>
					<div class="regi_input">
						<input type="text" name="id" class="input nick" placeholder="Nickname" autocomplete="off">
					</div>
					<div class="regi_info">
						<p class="name_info_re"></p>
					</div>
				</div>

				<div class="register_center_wrap rgi_email_wrap">
					<div class="regi_icon">
							<img src="header_img/email_icon.png" alt="icon" class="regi_email_icon re_icon">
					</div>
					<div class="regi_input">
						<input type="text" name="id" class="input regi_email_input" placeholder="E-mail" autocomplete="off">
					</div>
					<div class="regi_info">
						<p class="email_info_re"></p>
					</div>
				</div>

				<div class="register_center_wrap regi_phone_wrap">
					<div class="regi_icon">
							<img src="header_img/phone.png" alt="icon" class="regi_phone_icon re_icon">
					</div>
					<div class="regi_input">
						<input type="text" name="id" class="input regi_phone_input" placeholder="phone" autocomplete="off">
					</div>
					<div class="regi_info">
						<p class="phone_info_re"></p>
					</div>
				</div>
			</form>
			</div>
			<div class="id_center_btn re_btn">
					<div class="id_center_btn_wrap regi_btn_wrap_center">
							<button type="button" class="regi_btn">Join</button>
					</div>
					<div class="id_center_btn_wrap re_btn_wrap">
							<button type="button" class="cancel submit1">Cancel</button>
					</div>
				</div>
				<div class="login_info_div re_info_div">
					<p class="all_pp">In consideration of the person named below (hereinafter referred to as “participant”) being allowed to take part as a participant or volunteer counselor in 2009 </p>
				</div>
		</div>
	</div>
</div>


<!-- 아이디찾기 -->
<div id="find_ld">
	<div id="find_wrap">
		<div class="top_bottom">
			<div class="title">
				<p>DAP AND PIXEL GAMES</p>
			</div>
			<div class="close">
				<img src="header_img/close.png" alt="close">
			</div>
		</div>
		<div class="center">
			<div class="center_top">
				<p>Forgot your ID?</p>
			</div>
			<div class="center_ar">
				<form action="login_check.php" method="POST" class="form" id="find_id_form">
					<div class="id_form_wrap find_wrap_nick find_form_wrap">
						<div class="id_wrap_icon">
							<img src="header_img/id_icon.png" alt="icon" class="person_i find_nick_icon">
						</div>
						<div class="id_wrap_input">
						<input type="text" name="id" class="id_wrap_inputid find_new_id" placeholder="Nickname" autocomplete="off">
						</div>
						<div class="id_wrap_info">
						</div>
					</div>
					<div class="id_form_wrap find_wrap_email" style="margin-top: 2%;">
						<div class="id_wrap_icon find_wrap_icon find_form_wrap">
							<img src="header_img/email_icon.png" alt="icon" class="per_pw_i find_email_icon">
						</div>
						<div class="id_wrap_input">
							<!-- <input type="text" name="id" class="input loginid" autocomplete="off"> --><input type="text" name="id" class="id_wrap_inputid find_new_email" placeholder="E-mail" autocomplete="off">
						</div>
						<div class="id_wrap_info">

						</div>
					</div>
				</form>
				<div class="id_center_btn">
					<div class="id_center_btn_wrap">
							<button type="button" class="find_id_btn">Find</button>
					</div>
					<div class="id_center_btn_wrap">
							<button type="button" class="cancel submit1 find_cancel">Cancel</button>
					</div>
				</div>
				<div class="find_div_login">
					<div class="find_div_login_wrap find_id_pp">
						<p class="go_find_id_check">Find Password</p>
					</div>
				</div>
				<div class="login_info_div">
					<p class="all_pp">In consideration of the person named below (hereinafter referred to as “participant”) being allowed to take part as a participant or volunteer counselor in 2009 </p>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="find_pw">
	<div id="find_pw_wrap">
		<div class="top_bottom">
			<div class="title">
				<p>DAP AND PIXEL GAMES</p>
			</div>
			<div class="close">
				<img src="header_img/close.png" alt="close">
			</div>
		</div>
		<div class="center">
			<div class="center_top">
				<p>Forgot your Password?</p>
			</div>
			<div class="center_ar">
				<form action="login_check.php" method="POST" class="form" id="find_pw_form">
					<div class="id_form_wrap find_pw_id find_pw_wrap">
						<div class="id_wrap_icon">
							<img src="header_img/id_icon.png" alt="icon" class="person_i find_pw_id_icon">
						</div>
						<div class="id_wrap_input">
						<input type="text" name="id" class="id_wrap_inputid find_pw_new_id" placeholder="Dot and Pirxel ID" autocomplete="off">
						</div>
						<div class="id_wrap_info">
						</div>
					</div>
					<div class="id_form_wrap find_pw_wrap_email find_pw_wrap" style="margin-top: 2%;">
						<div class="id_wrap_icon">
							<img src="header_img/email_icon.png" alt="icon" class="per_pw_i find_email_pw_icon">
						</div>
						<div class="id_wrap_input">
							<!-- <input type="text" name="id" class="input loginid" autocomplete="off"> --><input type="text" name="id" class="id_wrap_inputid find_pw_new_email" placeholder="E-mail" autocomplete="off">
						</div>
						<div class="id_wrap_info">

						</div>
					</div>
				</form>
				<div class="id_center_btn">
					<div class="id_center_btn_wrap">
							<button type="button" class="find_pw_btn">Find</button>
					</div>
					<div class="id_center_btn_wrap">
							<button type="button" class="cancel submit1 find_cancel">Cancel</button>
					</div>
				</div>
				<div class="find_div_login">
					<div class="find_div_login_wrap find_id_pp">
						<p class="go_find_pw_check">Find Id</p>
					</div>
				</div>
				<div class="login_info_div">
					<p class="all_pp">In consideration of the person named below (hereinafter referred to as “participant”) being allowed to take part as a participant or volunteer counselor in 2009 </p>
				</div>
			</div>
		</div>
	</div>
</div>



<div id="chage_pw">
	<div id="chage_pw_wrap">
		<div class="top_bottom">
			<div class="title">
				<p>DAP AND PIXEL GAMES</p>
			</div>
			<div class="close">
				<img src="header_img/close.png" alt="close">
			</div>
		</div>
		<div class="center">
			<div class="center_top">
				<p>Change Password?</p>
			</div>
			<div class="center_ar">
				<form action="login_check.php" method="POST" class="form" id="change_pw_form">
					<!-- <div class="id_form_wrap change_pw_id_wrap change_pw_wrap">
						<div class="id_wrap_icon">
							<img src="header_img/id_pw_icon.png" alt="icon" class="person_i change_pw_id_icon">
						</div>
						<div class="id_wrap_input">
							<input type="password" name="id" class="id_wrap_inputid Current_Password" placeholder="Current_Password" autocomplete="off">
						</div>
						<div class="id_wrap_info chage_info_wrap">
							<p>현재비밀번호</p>
						</div>
					</div> -->
					<div class="id_form_wrap new_pw_wrap change_pw_wrap" style="margin-top: 2%;">
						<div class="id_wrap_icon">
							<img src="header_img/re_pw_icon.png" alt="icon" class="per_pw_i new_pw_icon">
						</div>
						<div class="id_wrap_input chage_id_input_wrap">
							<input type="password" name="id" class="id_wrap_inputid new_pw_input" placeholder="Change password" autocomplete="off">
						</div>
						<div class="id_wrap_info chage_info_wrap">
							<p class="dup_p"></p>
						</div>
					</div>
					<div class="id_form_wrap confirm_password_wrap change_pw_wrap" style="margin-top: 2%;">
						<div class="id_wrap_icon">
							<img src="header_img/re_pw_icon.png" alt="icon" class="per_pw_i confirm_password_icon">
						</div>
						<div class="id_wrap_input chage_id_input_wrap">
							<!-- <input type="text" name="id" class="input loginid" autocomplete="off"> --><input type="password" name="id" class="id_wrap_inputid confirm_password " placeholder="Confirm password" autocomplete="off">
						</div>
						<div class="id_wrap_info chage_info_wrap">
							<p class="pwch_info"></p>
						</div>
					</div>
				</form>
				<div class="id_center_btn chage_center_btn">
					<div class="id_center_btn_wrap">
							<button type="button" class="change_btn">Change</button>
					</div>
					<div class="id_center_btn_wrap">
							<button type="button" class="cancel submit1 find_cancel chage_cancel">Cancel</button>
					</div>
				</div>
				<div class="login_info_div">
					<p class="all_pp">In consideration of the person named below (hereinafter referred to as “participant”) being allowed to take part as a participant or volunteer counselor in 2009 </p>
				</div>
			</div>
		</div>
	</div>
</div>






<header style="z-index: 999;">
		<!-- <input type="text" name="text" class="aaa" style="color:black;"> -->
			<div id="logo">
				<a href="./index.php"><img src="header_img/white_logo.png" alt="logo"></a>
			</div>

			<nav>
				<ul class="menu">
					<li><a href="./subindex.php?title=1" data-hober="인디게임">인디게임</a></li>
					<li><a href="./subindex.php?title=2" data-hober="PC">&nbsp&nbsp&nbsp&nbspPC&nbsp&nbsp&nbsp&nbsp</a></li>
					<li><a href="./subindex.php?title=3" data-hober="PS4">&nbsp&nbsp&nbspPS4&nbsp&nbsp&nbsp</a></li>
					<li><a href="./subindex.php?title=4" data-hober="WII">&nbsp&nbsp&nbspWII&nbsp&nbsp&nbsp</a></li>
				</ul>
			</nav>
			
			<div>
					<?php
						if(isset($_SESSION['userid']))
						{
					?>
					<div style="position: relative;">
						<input type="text" name="search" id="search">
						<img src="header_img/icon.png" alt="png" style="left: 83%; top: -20%; position: absolute; width: 10%;height: 100%;" class="icon">
				    </div>
				    <?php
				    	}else{
				    ?>
					<div style="position: relative;">
						<input type="text" name="search" id="search1">
						<img src="header_img/icon.png" alt="png" style="left: 83%; top: -20%; position: absolute; width: 10%;height: 100%;" class="icon">
				    </div>
				    <?php
				    	}
				    ?>
				   
				<br>
				<?php
					if(isset($_SESSION['userid']))
					{
						?>
						<button type="button" class="btn login_btn" id="login_bt">로그아웃</button>
						<?php
					}else{
						?>
						<button type="button" class="btn login_btn" id="login_bt">로그인</button>
						<?php
					}
					?>				
				<button type="button" class="btn" id="reg_bt">회원가입</button>
			</div>
			<div style="width: 100%; height: 50px;
			 margin-top: 20px;"> 
			 <div id="google_translate_element"></div>
			</div>
		</header>
</body>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'ko', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        









</html>