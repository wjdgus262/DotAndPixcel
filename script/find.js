$(document).ready(function(){
	$(".go_find_id_check").click(function(){
		$("#find_ld").hide();
		$("#find_id_form")[0].reset();
  		reset_css(".id_form_wrap");
  		$("#find_pw").hide();
		$("#find_pw_form")[0].reset();
		reset_css(".find_pw_wrap");
  		$("#find_pw").show();
	});
	$(".go_find_pw_check").click(function(){
		$("#find_pw").hide();
		$("#find_pw_form")[0].reset();
		reset_css(".find_pw_wrap");
		$("#find_ld").hide();
		$("#find_id_form")[0].reset();
  		reset_css(".id_form_wrap");
		$("#find_ld").show();
	});
	$(".go_find_id").click(function(){
		$("#modal_login").hide();
		$("#login_form")[0].reset();
  		reset_css(".id_form_wrap");
		$("#find_ld").show();
	});
	$(".go_find_pw").click(function(){
		$("#modal_login").hide();
		$("#login_form")[0].reset();
  		reset_css(".id_form_wrap");
  		$("#find_pw").show();
	});

	var find_nick_check = false;
	var find_email_check = false;
	$(".find_new_id").focusin(function(){
		inputfoucs(".find_wrap_nick");
		$(".find_nick_icon").show();
	});
	$(".find_new_id").focusout(function(){
		var nick = $(this).val();
		if(nick == '')
		{
			inputerror(".find_wrap_nick");
			$(".find_nick_icon").hide();
			find_nick_check = false;
		}else{
			inputsuccess(".find_wrap_nick");
			$(".find_nick_icon").hide();
			find_nick_check = true;
		}
	});
	$(".find_new_email").focusin(function(){
		inputfoucs(".find_wrap_email");
		inputfoucs(".find_wrap_icon");
		$(".find_email_icon").show();

	});
	$(".find_new_email").focusout(function(){
		var e = $(this).val();
		if(e == "")
		{
			inputerror(".find_wrap_email");
			inputerror(".find_wrap_icon");
			$(".find_email_icon").hide();
			find_email_check = false;
		}else{
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if(!re.test($(".find_new_email").val()))
			{
				inputerror(".find_wrap_email");
				inputerror(".find_wrap_icon");
				$(".find_email_icon").hide();
				find_email_check = false;			
			}else{
				inputsuccess(".find_wrap_email");
				inputsuccess(".find_wrap_icon");
				$(".find_email_icon").hide();	
				find_email_check = true;
			}
		}
	});

	$(".find_id_btn").click(function(){
		var nick = $(".find_new_id").val();
		var email = $(".find_new_email").val();
		if(find_nick_check == false)
		{
			var txt = "닉네임을 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else if(find_email_check == false){
			var txt = "이메일을 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else{
			$.ajax({
				type:"POST",
				url:"./find_php/find_id.php",
				data:"nick="+nick+"&email="+email,
				success:function(response){
					if(response == "error")
					{
						var txt = "아이디를 찾을수 없습니다.";
       	   				popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
					}else{
							var txt=  "회원님의 아이디는"+response+"입니다. <br> 비밀번호를 찾으러 가시겠습니까?";
							popWindow.dialog(txt, popWindow.dialog.typeEnum.confirm,{
								onOk:function(){
										$("#find_ld").hide();
										$("#find_id_form")[0].reset();
								  		reset_css(".id_form_wrap");
								  		$("#find_pw").hide();
										$("#find_pw_form")[0].reset();
										reset_css(".find_pw_wrap");
								  		$("#find_pw").show();						
								},
								onCancel:function(){
									$("#find_ld").hide();
										$("#find_id_form")[0].reset();
								  		reset_css(".id_form_wrap");
								  		$("#find_pw").hide();
										$("#find_pw_form")[0].reset();
										reset_css(".find_pw_wrap");
								  		$("#find_pw").hide();
								}
							});
					}
				}
			});
		}
	});


	var find_pw_id_check = false;
	var find_pw_new_email = false;
	$(".find_pw_new_id").focusin(function(){
		inputfoucs(".find_pw_id");
		$(".find_pw_id_icon").show();
	});
	$(".find_pw_new_email").focusin(function(){
		inputfoucs(".find_pw_wrap_email");
		$(".find_email_pw_icon").show();
	});

	$(".find_pw_new_id").focusout(function(){
		
		var id = $(this).val();
		if(id == '')
		{
			inputerror(".find_pw_id");
			$(".find_pw_id_icon").hide();
			find_pw_id_check = false;
		}else{
			inputsuccess(".find_pw_id");
			$(".find_pw_id_icon").hide();
			find_pw_id_check = true;
		}
	});

	$(".find_pw_new_email").focusout(function(){
		var email = $(this).val();
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(email == '')
		{
			inputerror(".find_pw_wrap_email");
			$(".find_email_pw_icon").hide();
			find_pw_new_email = false;
		}else if(!re.test(email))
		{
			inputerror(".find_pw_wrap_email");
			$(".find_email_pw_icon").hide();
			find_pw_new_email = false;
		}else{
			inputsuccess(".find_pw_wrap_email");
			$(".find_email_pw_icon").hide();
			find_pw_new_email = true;
		}
	});

	var save_id = "";
	var defaultpw = "";
	$(".find_pw_btn").click(function(){
		var id = $(".find_pw_new_id").val();
		var email = $(".find_pw_new_email").val();
		if(find_pw_id_check == false)
		{
			var txt = "아이디를 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else if(find_pw_new_email == false)
		{
			var txt = "이메일을 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
       	  }else{
       	  		$.ajax({
				type:"POST",
				url:"./find_php/find_pw.php",
				data:"ch_id="+id+"&ch_email="+email,
				success:function(response){
					if(response == "error")
					{
						var txt = "비밀번호를 찾을수 없습니다.";
       	   				popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
					}else{
						var split = response.split(",");
						save_id = split[0];
						defaultpw = split[1];

						$("#find_pw").hide();
  						$("#find_pw_form")[0].reset();
  						reset_css(".find_pw_wrap");
  						$(".Current_Password").val(defaultpw);
  						 $(".Current_Password").attr('disabled','disabled');
						$("#chage_pw").show();
					}
				}
			});	
       	  }
	});

	var cur_pw_chck = false;
	var new_input_check = false;
	var confirm_password_check = false;
	$(".Current_Password").focusin(function(){
		inputfoucs(".change_pw_id_wrap");
		$(".change_pw_id_icon").show();
	});

	$(".new_pw_input").focusin(function(){
		inputfoucs(".new_pw_wrap");
		$(".dup_p").text("");
		$(".new_pw_icon").show();
	});

	$(".confirm_password").focusin(function(){
		inputfoucs(".confirm_password_wrap");
		$(".pwch_info").text("");
		$(".confirm_password_icon").show();
	});


	$(".Current_Password").focusout(function(){
		var cp = $(this).val();

		if(cp == '')
		{
			inputerror(".change_pw_id_wrap");
			$(".change_pw_id_icon").hide();
			cur_pw_chck = false;
		}else{
			inputsuccess(".change_pw_id_wrap");
			$(".change_pw_id_icon").hide();
			cur_pw_chck = true;
		}
	});
	$(".new_pw_input").focusout(function(){
		var pw = $(this).val();
		var pattern1 = /[0-9]/;
        var pattern2 = /[a-zA-Z]/;
        var pattern3 = /[~!@\#$%<>^&*]/;
		if(pw == '')
		{
			inputerror(".new_pw_wrap");
			$(".new_pw_icon").hide();
			$(".dup_p").text("비밀번호를 입력해주세요");
			$(".dup_p").css("margin-top","18px");
			new_input_check = false;
		}else if(!pattern1.test(pw)||!pattern2.test(pw)||!pattern3.test(pw)||pw.length<8||pw.length>50)
        {
         	inputerror(".new_pw_wrap");
         	$(".dup_p").text("영어+숫자+특수문자 포함 8자리 이상으로 만들어주세요");
         	$(".dup_p").css("margin-top","10px");
         	$(".new_pw_icon").hide();
         	new_input_check = false;
        }else{
        	$.ajax({
				type:"POST",
				url:"./find_php/find_pw_check.php",
				data:"id="+save_id,
				success:function(response)
				{
					if(pw == response)
					{
						inputerror(".new_pw_wrap");
						$(".dup_p").text("현재비밀번호랑 다르게 해주세요.");
						$(".dup_p").css("margin-top","25px");
						$(".new_pw_icon").hide();
						new_input_check = false;
					}else if(response == "error"){

					}else{
						inputsuccess(".new_pw_wrap");
						$(".dup_p").text("");
						$(".dup_p").css("margin-top","18px");
        				$(".new_pw_icon").hide();
        				new_input_check = true;
					}
				}
			});
        }
	});
	$(".confirm_password").focusout(function(){
		var pw = $(".new_pw_input").val();
		var ph = $(this).val();
		if(pw != ph)
		{
			inputerror(".confirm_password_wrap");
			$(".confirm_password_icon").hide();
			$(".pwch_info").text("비밀번호가 맞지 않습니다.");
			$(".pwch_info").css("margin-top","15px");
			confirm_password_check = false;
		}else{
			inputsuccess(".confirm_password_wrap");
			$(".pwch_info").text("");
			$(".pwch_info").css("margin-top","15px");
			$(".confirm_password_icon").hide();

			confirm_password_check = true;
		}
	});

	$(".change_btn").click(function(){
		// alert(save_id);
		var ch_pw = $(".confirm_password").val();
		if(new_input_check == false)
       	 {
       	 	var txt = "새로운 비밀번호를 확인해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
       	 }else if(confirm_password_check == false)
       	 {
       	 	var txt = "새로운 비밀번호를 확인해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
       	 }else{
       	 		$.ajax({
				type:"POST",
				url:"./find_php/chage_pw.php",
				data:"ch_id="+save_id+"&ch_pw="+ch_pw,
				success:function(response){
					if(response == "success")
					{
						var txt=  "비밀번호가 변경 되었습니다. <br> 로그인 페이지로 이동하시겠습니까?";
							popWindow.dialog(txt, popWindow.dialog.typeEnum.confirm,{
								onOk:function(){
									$(".popWindow").hide();
									$("#chage_pw").hide();
									$("#change_pw_form")[0].reset();
									reset_css(".change_pw_wrap");
									$("#login_form")[0].reset();
  									reset_css(".id_form_wrap");
									$("#modal_login").show();
								
								},
								onCancel:function(){
									$(".popWindow").hide();
									$("#chage_pw").hide();
									$("#change_pw_form")[0].reset();
									reset_css(".change_pw_wrap");
								}
							});
					}
				}
			});	
       	 }
	});


	function inputfoucs(target)
	{
		$(target).css("background","#34354B");
	}
	function inputerror(target)
	{
		$(target).css("background","#E40702");
	}
	function inputsuccess(target)
	{
		$(target).css("background","#45A910");
	}
	function reset_css(target)
	{
		$(".per_pw_i").show();
		$(".person_i").show();
		$(target).css("background","#34354B");
	}
});