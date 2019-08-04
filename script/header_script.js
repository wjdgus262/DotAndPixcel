$(document).ready(function(){
			$(".not_good").hide();
	$("#modal_login").hide();
	$("#register_modal").hide();
	$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
  			$("#modal_login").hide();
  			$("#register_modal").hide();
  			
  			$("#login_form")[0].reset();

  			reset_css(".id_form_wrap");
  			$(".re_gei_form")[0].reset();
  			reset_css(".register_center_wrap");
  			$(".re_icon").show();
    	
    		$("#find_ld").hide();
  			$("#find_id_form")[0].reset();
  			reset_css(".find_form_wrap");

  			$("#find_pw").hide();
  			$("#find_pw_form")[0].reset();
  			reset_css(".find_pw_wrap");

  			$(".id_info_re").text("");
			$(".phone_info_re").text("");
			$(".email_info_re").text("");
			$(".name_info_re").text("");
			$(".pwch_info_re").text("");
			$(".pw_info_re").text("");

  			$("#chage_pw").hide();
  			$("#change_pw_form")[0].reset();
  			reset_css(".change_pw_wrap");

  			$(".dup_p").text("");
  			$(".pwch_info").text("");

    	}
	});
	$(".find_id_p").click(function(){
		$("#modal_login").hide();

		$("#find_id_body").show();
		$(".find_nick").focus();
		targetfucous(".find_nick");
	});


	 $("#login_bt").click(function(){
	 	var a = $(this).text();
	 	// alert(a);
	 	if(a == "로그인")
	 	{
	 		$("#modal_login").show();
	 		$('.loginid').focus();
	 		$(".loginid").css("box-shadow","0 0 5px 2px #EE781A");
        $(".loginid").css("-webkit-box-shadow","0 0 5px 2px #EE781A");
        $(".loginid").css("border","1px solid #EE781A");
	 	}else if (a == "로그아웃"){
	 		$.ajax({
				type:"POST",
				url:"./logout.php",
				success:function(response){
					var txt = response+" 님 오늘도 좋은 하루 되시고.<br> 안녕히 가세요.";
       	   				popWindow.dialog(txt,popWindow.dialog.typeEnum.success,{
       	   					onOk:function(){
       	   						location.reload();
       	   					}
       	   				});

				}
			});
	 	}
	 	
	 });

	 $("#reg_bt").click(function(){
	 	$("#register_modal").show();
	 	$(".regiid").focus();
	 	$(".regiid").css("box-shadow","0 0 5px 2px #EE781A");
        $(".regiid").css("-webkit-box-shadow","0 0 5px 2px #EE781A");
        $(".regiid").css("border","1px solid #EE781A");
	 });

	$(".close > img").click(function(){
		  	$("#modal_login").hide();
  			$("#login_form")[0].reset()
  			reset_css(".id_form_wrap");
  			$("#register_modal").hide();
  			$(".re_gei_form")[0].reset();
			reset_css(".register_center_wrap");
			$(".re_icon").show();

			$("#find_ld").hide();
  			$("#find_id_form")[0].reset();
  			reset_css(".find_form_wrap");

  			$("#find_pw").hide();
  			$("#find_pw_form")[0].reset();
  			reset_css(".find_pw_wrap");

  			$(".id_info_re").text("");
			$(".phone_info_re").text("");
			$(".email_info_re").text("");
			$(".name_info_re").text("");
			$(".pwch_info_re").text("");
			$(".pw_info_re").text("");

  			$("#chage_pw").hide();
  			$("#change_pw_form")[0].reset();
  			reset_css(".change_pw_wrap");

  			$(".dup_p").text("");
  			$(".pwch_info").text("");
	});
	$(".regiid").focus();
	$("#go_regi").click(function(){
		$("#login_form")[0].reset();
		$("#modal_login").hide();
		$("#register_modal").show();
		$(".regiid").focus();
		$(".regiid").css("box-shadow","0 0 5px 2px #EE781A");
        $(".regiid").css("-webkit-box-shadow","0 0 5px 2px #EE781A");
        $(".regiid").css("border","1px solid #EE781A");
	});
	 $(".submit1").click(function(){
	 		$("#modal_login").hide();
  			$("#login_form")[0].reset()
  			$("#register_modal").hide();
  			reset_css(".id_form_wrap");
  			$(".re_gei_form")[0].reset();
			reset_css(".register_center_wrap");
			$(".re_icon").show();
			$(".id_info_re").text("");
			$(".phone_info_re").text("");
			$(".email_info_re").text("");
			$(".name_info_re").text("");
			$(".pwch_info_re").text("");
			$(".pw_info_re").text("");

			$("#find_ld").hide();
  			$("#find_id_form")[0].reset();
  			reset_css(".find_form_wrap");

  			$("#find_pw").hide();
  			$("#find_pw_form")[0].reset();
  			reset_css(".find_pw_wrap");

  			$("#chage_pw").hide();
  			$("#change_pw_form")[0].reset();
  			reset_css(".change_pw_wrap");

  			$(".dup_p").text("");
  			$(".pwch_info").text("");
    });

	$("#search").focusin(function() {
        $('.icon').css('display', 'none');
    });
    $("#search").focusin(function() {
        $('.icon').css('display', 'none');
    });

	$(".password").focusin(function(){
		targetfucous(".password");
	});

	

	var re_id_check = false;
	var re_pw_check = false;
	var re_pwch_check = false;
	var re_nick_check = false;
	var re_email_check = false;
	var re_phone_check = false;


	$(".regi_id").focusin(function(){
		inputfoucs(".regi_id_wrap");
		$(".id_info_re").text("");
		$(".regi_id_icon").show();
	});

	$(".regi_id").focusout(function(){
		var id = $(this).val();
		if(id == '')
		{
			inputerror(".regi_id_wrap");
			$(".regi_id_icon").hide();
			$(".id_info_re").text("아이디를 입력해주세요.");
            re_id_check = false;
            return false;
		}else{
			var length = id.length;
			
			var non_kor = /[^a-z0-9]/gi;
			if(!non_kor.test(id) && length >= 4)
			{
				$.ajax({
					type:"POST",
					url:"./id_double_check.php",
					data:"id="+id,
					success:function(response){
						if(response == "not_empty")
						{
							inputsuccess(".regi_id_wrap");
							$(".regi_id_icon").hide();
							$(".id_info_re").text("");
				            re_id_check = true;
						}else{
							inputerror(".regi_id_wrap");
							$(".regi_id_icon").hide();
							$(".id_info_re").text("중복된아이디 입니다.");
				            re_id_check = false;
						}
					}
				});
			}else{
				inputerror(".regi_id_wrap");
				$(".regi_id_icon").hide();
				$(".id_info_re").text("4글자 이상 입력해주세요.");
            	re_id_check = false;
            	return false;
			}
			
		}
	});
	$(".regi_pw").focusin(function(){
		inputfoucs(".regi_pw_wrap");
		$(".pw_info_re").text("");
		$(".regi_pw_icon").show();
	});
	$(".regi_pw").focusout(function(){
		var pw = $(this).val();
		 var pattern1 = /[0-9]/;
        var pattern2 = /[a-zA-Z]/;
        var pattern3 = /[~!@\#$%<>^&*]/;
        if(pw == "")
        {
         	inputerror(".regi_pw_wrap");
			$(".regi_pw_icon").hide();
			$(".pw_info_re").text("비밀번호를 입력해주세요.");
			$(".pw_info_re").css("margin-top","20px");
            re_pw_check = false
            return false;
        }else if(!pattern1.test(pw)||!pattern2.test(pw)||!pattern3.test(pw)||pw.length<8||pw.length>50)
        {
         	inputerror(".regi_pw_wrap");
			$(".regi_pw_icon").hide();
			$(".pw_info_re").text("영어+숫자+특수문자 포함 8자리 이상으로 만들어주세요");
            $(".pw_info_re").css("margin-top","10px");
            re_pw_check = false
            return false;
        }else{
         	inputsuccess(".regi_pw_wrap");
			$(".regi_pw_icon").hide();
			$(".pw_info_re").text("");
            re_pw_check = true
            return false;
        }

	});

	$(".regi_pw_ch").focusin(function(){
		inputfoucs(".regi_pw_ch");
		$('.pwch_info_re').text("");
		$(".regi_pw_ch_icon").show();
	});

	$(".regi_pw_ch_input").focusout(function(){
		var pw = $(".regi_pw").val();
		var pwch = $(this).val();
		if(pwch == '')
		{
			inputerror(".regi_pw_ch");
			$(".regi_pw_ch_icon").hide();
			$('.pwch_info_re').text("비밀번호를 입력해주세요.");
			re_pwch_check = false;
		}else if(pwch == pw)
		{
			inputsuccess(".regi_pw_ch");
			$(".regi_pw_ch_icon").hide();
			$('.pwch_info_re').text("");
			re_pwch_check = true;
		}else{
			inputerror(".regi_pw_ch");
			$(".regi_pw_ch_icon").hide();
			$('.pwch_info_re').text("비밀번호를 확인해주세요.");
			re_pwch_check = false;
		}

	});



	$(".nick").focusin(function(){
		inputfoucs(".regi_nick_wrap");
		$(".name_info_re").text("");
		$(".regi_nick_icon").show();
	});
	$(".nick").focusout(function(){
		var nick = $(this).val();
		if(nick == '')
		{
			inputerror(".regi_nick_wrap");
			$(".regi_nick_icon").hide();
			$(".name_info_re").text("닉네임을 입력해주세요.");	
            re_nick_check = false;
            return false;
		}else{
			var length = nick.length;
			if(length >= 2)
			{
				$.ajax({
					type:"POST",
					url:"./nick_double_check.php",
					data:"nickname="+nick,
					success:function(response){
						if(response == "not_empty")
						{
							inputsuccess(".regi_nick_wrap");
							$(".regi_nick_icon").hide();
							$(".name_info_re").text("");		
				            re_nick_check = true;
						}else{
							inputerror(".regi_nick_wrap");
							$(".regi_nick_icon").hide();	
							$(".name_info_re").text("중복된 닉네임 입니다.");	
				            re_nick_check = false;
						}
					}
				});
			}else{
				inputerror(".regi_nick_wrap");
				$(".regi_nick_icon").hide();
				$(".name_info_re").text("2글자 이상 입력해주세요.");		
	            re_nick_check = false;
	            return false;
			}
		}
	});

	$(".regi_email_input").focusin(function(){
		inputfoucs(".rgi_email_wrap");
		$(".email_info_re").text("");
		$(".regi_email_icon").show();
	});


	$(".regi_email_input").focusout(function(){
		var e = $(".regi_email_input").val();
		if(e == "")
		{
			inputerror(".rgi_email_wrap");
			$(".regi_email_icon").hide();
			$(".email_info_re").text("이메일을 입력해주세요.");
			re_email_check = false;
		}else{
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if(!re.test($(".regi_email_input").val()))
			{
				inputerror(".rgi_email_wrap");
				$(".regi_email_icon").hide();
				$(".email_info_re").text("알맞지 않은 이메일 입니다.");
				re_email_check = false;			
			}else{
				inputsuccess(".rgi_email_wrap");
				$(".regi_email_icon").hide();
				$(".email_info_re").text("");	
				re_email_check = true;	
			}
		}
	});

	$(".regi_phone_input").focusin(function(){
		inputfoucs(".regi_phone_wrap");
		$(".phone_info_re").text("");
		$(".regi_phone_icon").show();
	});

	$(".regi_phone_input").focusout(function(){
		var phone = $(this).val();
		var regExp = /^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/;

		if(phone == '')
		{
			inputerror(".regi_phone_wrap");
			$(".regi_phone_icon").hide();
			$(".phone_info_re").text("전화번호를 입력해주세요.");
			re_phone_check = false;
		}else if(!regExp.test(phone)){
			inputerror(".regi_phone_wrap");
			$(".phone_info_re").text('알맞지 않은 전화번호 입니다.');
			$(".regi_phone_icon").hide();
			re_phone_check = false;
		}else{
			inputsuccess(".regi_phone_wrap");
			$(".regi_phone_icon").hide();
			$(".phone_info_re").text("");
			re_phone_check = true;
		}
	});


	$(".regi_btn").click(function(){
		if(re_id_check == false)
		{
			var txt = "아이디를 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else if(re_pw_check == false || re_pwch_check == false)
		{
			var txt = "비밀번호를 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else if(re_nick_check == false)
		{
			var txt = "닉네임을 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else if(re_email_check == false){
			var txt = "이메일을 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else if(re_phone_check == false){
			var txt = "전화번호를 확인 해주세요.";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else{
			var id = $(".regi_id").val();
			var pw = $(".regi_pw").val();
			var pwch = $(".regi_pw_ch_input").val();
			var nick = $(".nick").val();
			var mail = $(".regi_email_input").val();
			var phone = $(".regi_phone_input").val();
			var txt=  "회원가입 하시겠습니까?";
			popWindow.dialog(txt, popWindow.dialog.typeEnum.confirm,{
				onOk:function(){
					$.ajax({
					type:"POST",
					url:"./register.php",
					data:"id="+id+"&pw="+pw+"&nick="+nick+"&mail="+mail+"&phone="+phone,
					success:function(response){
						if(response == "success")
						{
							var txt = "회원가입이 완료되었습니다.";
       	   					popWindow.dialog(txt,popWindow.dialog.typeEnum.success,{
       	   						onOk:function(){
       	   							$("#register_modal").hide();
       	   							$(".re_gei_form")[0].reset();
						  			reset_css(".register_center_wrap");
						  			$(".re_icon").show();
       	   						},
       	   					});
       	   						 	
						}else{
							var txt = "회원가입에 실패했습니다..";
       	   					popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
						}
					}
				});
				}
			});
		}
	});



	$(document).keyup(function(e) {
     if (e.keyCode == 27) { 
     		$(".popWindow").css("display","none");
   		 }
	});

	var idcheck = false;
	var pwcheck = false;
	$(".newid").focusin(function(){
		$(".person_i").show();
		inputfoucs(".id_form_wrap_id");
	});
	$(".newid").focusout(function(){
		var id = $(this).val();
		if(id == '')
		{
			$(".person_i").hide();
			// $(".id_form_wrap_id").css("background","#E40702");
			inputerror(".id_form_wrap_id");
			idcheck = false;
		}else{
			$(".person_i").hide();
			// $(".id_form_wrap_id").css("background","#45A910");
			inputsuccess(".id_form_wrap_id");
			idcheck = true;
		}
	});
	$(".newpw").focusin(function(){
		$(".per_pw_i").show();
		inputfoucs(".id_pw_form");
	});
	$(".newpw").focusout(function(){
		var pw = $(this).val();
		if(pw == '')
		{
			$(".per_pw_i").hide();
			// $(".id_form_wrap_id").css("background","#E40702");
			inputerror(".id_pw_form");
			pwcheck = false;
		}else{
			$(".per_pw_i").hide();
			// $(".id_form_wrap_id").css("background","#45A910");
			inputsuccess(".id_pw_form");
			pwcheck = true;
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


	$(".login_btn1").click(function(){
		// alert("aa");
		if(idcheck == false)
		{
			var txt = "아이디를 입력해주세요";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else if(pwcheck == false)
		{
			var txt = "비밀번호를 입력해주세요";
       	   	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
		}else if(idcheck == true && pwcheck == true)
		{
			var id = $(".newid").val();
			var pw = $(".newpw").val();
			$.ajax({
				type:"POST",
				url:"./login_check.php",
				data:"id="+id+"&pw="+pw,
				success:function(response){
				
					if(response != "a")
					{
						var txt = response+" 님 환영합니다.<br> DAP Games 에서 즐거운 시간 되세요.";
       	   				popWindow.dialog(txt,popWindow.dialog.typeEnum.success,{
       	   					onOk:function(){
       	   						location.reload();
       	   					}
       	   				});
					}else{
						var txt = "아이디 혹은 비밀번호가 틀렸습니다.";
       	   				popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
					}

					
				}
			});
		}
	});

    $("#search").focusout(function() {
    	var text = $("#search").val();
    	if(text == "")
    	{
    		$('.icon').css('display', 'block');
    	}else{
    		$('.icon').css('display', 'none');
    	}
        
    });
	$("#search1").focusout(function() {
    	var text = $("#search").val();
    	if(text == "")
    	{
    		$('.icon').css('display', 'block');
    	}else{
    		$('.icon').css('display', 'none');
    	}
        
    });
	$("#search").keydown(function (key) {
 
        if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
       	    var a = $("#search").val();
       	    if(a == '')
       	    {
       	    	var txt = "검색어를 입력해주세요";
       	    	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
       	    }else{
       	    	location.href="./thirdindex.php?mode=ser&name="+a;
       	    }
       	    
        }
    });	

    $("#search1").keydown(function (key) {
 
        if(key.keyCode == 13){//키가 13이면 실행 (엔터는 13)
       	    // var a = $("#search").val();
       	    // if(a == '')
       	    // {
       	    // 	var txt = "검색어를 입력해주세요";
       	    // 	popWindow.dialog(txt,popWindow.dialog.typeEnum.error);
       	    // }else{
       	    // 	location.href="./thirdindex.php?mode=ser&name="+a;
       	    // }
       	    var txt=  "로그인 해주세요.";
			popWindow.dialog(txt, popWindow.dialog.typeEnum.error,{
				onOk:function(){
       	   						// location.reload();
       	   						$("#modal_login").show();
	 							$('.loginid').focus();
       	   		}
			});
       	    
        }
    });	
});