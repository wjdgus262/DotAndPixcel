$(document).ready(function(){

delayload("#one_delay > .new_img_div");
			for(var i = 1; i <= 6; i++)
			{
				// var imgdiv = "<div class='img_wrap'></div>"
				var imgdiv = "<img src='img/coc/"+i+".jpg' alt='img'>"
				var imgdiv1 = "<img src='img/cc/"+i+".jpg' alt='img'>"
				// <img src='img/coc/"+i+".jpg' alt='img'>
				$(".img_info").append(imgdiv);
				$(".img_info1").append(imgdiv1);
			}

		// $(".carousel").slick({
		// 		speed:300,
		// 		slidesToShow:4,
		// 		slidesToScroll:3,
		// 		autoplay:true,
  // autoplaySpeed:1500,centerMode:true
		// });
		//---------갤러리 슬라이드 끝---------


var count = 0;
		$(".tap1").show();
		$(".tap2").hide();
		$(".tap3").hide();
		$(".tap4").hide();
		$("#columns1").hide();
		$("#columns3").hide();
		$("#columns5").hide();
		$("#columns7").hide();
		var check = 1;
		var he = $(".tap1").height();
		// alert(he);
		$("article").height(he);
			$("section").height(he);



		$(".tap_menu > li:nth-child(1)").append("<div class='li_after'></div>");
		$(".li_after").animate({
				opacity:'1',
				top:39
			},200);

		$(".tap_menu > li:nth-child(1)").click(function(){
			delayload("#one_delay > .new_img_div");
			// $( 'section' ).height('1400px');
			// $(".infobtn").show();
			// $("#columns1").hide();
			// $(".stap").remove();
			check  = 1;
			$(".tap1").show();
			$(".tap2").hide();
			$(".tap3").hide();
			$(".tap4").hide();
			// var he = $(".tap1").height();
			// alert(he);
			$("article").height(he);
			$("section").height(he);
			$(".li_after").remove();
			$(this).append("<div class='li_after'></div>");
			$(".li_after").animate({
				opacity:'1',
				top:39
			},300);
 			count = 0;
		});
		$(".tap_menu > li:nth-child(2)").click(function(){
			delayload("#two_delay > .new_img_div");
			// $( 'section' ).height('1400px');
			// $(".infobtn").show();
			// $("#columns3").hide();
			// $(".stap").remove();
			check  = 2;
			$(".tap2").show();
			$(".tap1").hide();
			$(".tap3").hide();
			$(".tap4").hide();
			$(".li_after").remove();
			$(this).append("<div class='li_after'></div>");
			$(".li_after").animate({
				opacity:'1',
				top:39
			},300);

			var he = $(".tap2").height();
			$("article").height(he);
			$("section").height(he);

			 count = 0;
		});
		$(".tap_menu > li:nth-child(3)").click(function(){
			delayload("#three_delay > .new_img_div");
			// $( 'section' ).height('1400px');
			// $("#columns5").hide();
			// $(".infobtn").show();
			// $(".stap").remove();
			check  = 3;
			$(".tap3").show();
			$(".tap1").hide();
			$(".tap2").hide();
			$(".tap4").hide();
			$(".li_after").remove();
			$("article").height(he);
			$("section").height(he);
			$(this).append("<div class='li_after'></div>");
			$(".li_after").animate({
				opacity:'1',
				top:39
			},300);
			 count = 0;
		});
		$(".tap_menu > li:nth-child(4)").click(function(){
			delayload("#for_delay > .new_img_div");
			// $( 'section' ).height('1400px');
			// $(".infobtn").show();
			// $("#columns7").hide();
			check  = 4;
			$(".tap4").show();
			$(".tap1").hide();
			$(".tap2").hide();
			$(".tap3").hide();
			$(".li_after").remove();
			$("article").height(he);
			$("section").height(he);
			$(this).append("<div class='li_after'></div>");
			$(".li_after").animate({
				opacity:'1',
				top:39
			},300);
			 count = 0;
		});

		// $(".stap").hide();

		$(".infobtn").click(function(){
 				$( 'section' ).animate({
				height:2300
			},1000);
 				$(".stap").show();
 				var offset = $(".stap").offset();
				$("html,body").animate({scrollTop : offset.top},1000);

 				$(".infobtn").fadeOut('100');
		});



	$(window).on("scroll", function(e) {
	var scrollHeight = $(document).height();
	var scrollPosition = $(window).height() + $(window).scrollTop();		


	if (scrollPosition > scrollHeight - 100) {			
		//todo
		if(count == 1)
		{
			 e.preventDefault();
  e.stopPropagation();
  return false;
		}
		// var aa = $("section").height();
		// var height = aa+1000;
		// $("section").css('height',height+"px");
		count++;
		if(check == 1)
		{
			delayload("#columns1 > .fff");
			$("#columns1").show();
							var he = $(".tap1").height();
			$("article").height(he);
			$("section").height(he);
		}
		if(check == 2)
		{

			delayload("#columns3 > .fff");
			$("#columns3").show();
			var he = $(".tap2").height();
			$("article").height(he);
			$("section").height(he);
		}
		if(check == 3)
		{
			// alert("aa");
			delayload("#columns5 > .fff");
			$("#columns5").show();
			var he = $(".tap3").height();
			$("article").height(he);
			$("section").height(he);
		}
		if(check == 4)
		{
			delayload("#columns7 > .fff");
			$("#columns7").show();
			var he = $(".tap4").height();
			$("article").height(he);
			$("section").height(he);
		}
	}
});

	var bhe = $(".b_button").height();
	$(".b_p").css('line-height',bhe+"px");


	function delayload(aa)
	{
		var delaySpped = 150;
		var fadeSpeed = 1000;
		$(aa).each(function(i){
			$(this).delay(i*(delaySpped)).css({opacity:'0'}).animate({opacity:'1'},fadeSpeed);
		});
	}







	$('.new_slide_wrap').slick({
    vertical: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay:true,
    verticalSwiping: true,
	});


	$(".new_img_div").mouseover(function(){
		$(this).children(".fi_black").fadeIn();
		// b_button
		$(this).children(".fi_black").children(".b_button").fadeIn();
	});

	$(".new_img_div").mouseleave(function(){
		$(this).children(".fi_black").stop().fadeOut();
		// b_button
		$(this).children(".fi_black").children(".b_button").stop().fadeOut();
	});
});