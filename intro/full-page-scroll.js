/**
 * Full page
 */
 const left_ch = parseInt($("#content_icon1").css("left"));
  const rigth_ch = parseInt($("#inde1").css("left"));
  const top_ch = parseInt($("#inde3").css("top"));
  var video1 = $("#video1");
		var video2 = $("#video2");
		var video3 = $("#video3");
		var video4 = $("#video4");
(function () {
	'use strict';
	
	/**
	 * Full scroll main function
	 */
	var fullScroll = function (params) {
		/**
		 * Main div
		 * @type {Object}
		 */
		var main = document.getElementById('main');
		
		/**
		 * Sections div
		 * @type {Array}
		 */
		var sections = main.getElementsByTagName('section');
		
		/**
		 * Full page scroll configurations
		 * @type {Object}
		 */
		var defaults = {
			container : main,
			sections : sections,
			animateTime : params.animateTime || 0.7,
			animateFunction : params.animateFunction || 'ease',
			maxPosition: sections.length - 1,
			currentPosition: 0,
			displayDots: typeof params.displayDots != 'undefined' ? params.displayDots : true,
			dotsPosition: params.dotsPosition || 'left'
		};

		this.defaults = defaults;
		/**
		 * Init build
		 */
		this.init();
	};

	/**
	 * Init plugin
	 */
	fullScroll.prototype.init = function () {
		this.buildSections()
			.buildDots()
			.buildPublicFunctions()
			.addEvents();

		var anchor = location.hash.replace('#', '').split('/')[0];
		location.hash = 0;
		this.changeCurrentPosition(anchor);
	};

	/**
	 * Build sections
	 * @return {Object} this(fullScroll)
	 */
	fullScroll.prototype.buildSections = function () {
		var sections = this.defaults.sections;
		for (var i = 0; i < sections.length; i++) {
			sections[i].setAttribute('data-index', i);
		}
		return this;
	};

	/**
	 * Build dots navigation
	 * @return {Object} this (fullScroll)
	 */
	fullScroll.prototype.buildDots = function () {		
		this.ul = document.createElement('ul');
		this.ul.classList.add('dots');
		this.ul.classList.add(this.defaults.dotsPosition == 'right' ? 'dots-right' : 'dots-left');
		var _self = this;
		var sections = this.defaults.sections;		

		for (var i = 0; i < sections.length; i++) {
			var li = document.createElement('li');
			var a = document.createElement('a');
		
			a.setAttribute('href', '#' + i);			
			li.appendChild(a);
			_self.ul.appendChild(li);
		}

		this.ul.childNodes[0].firstChild.classList.add('active');

		if (this.defaults.displayDots) {
			document.body.appendChild(this.ul);
		}

		return this;
	};

	/**
	 * Add Events
	 * @return {Object} this(fullScroll)
	 */
	fullScroll.prototype.addEvents = function () {
		
		if (document.addEventListener) {
			document.addEventListener('mousewheel', this.mouseWheelAndKey, false);
			document.addEventListener('wheel', this.mouseWheelAndKey, false);
			document.addEventListener('keyup', this.mouseWheelAndKey, false);
			document.addEventListener('touchstart', this.touchStart, false);
			document.addEventListener('touchend', this.touchEnd, false);
			window.addEventListener("hashchange", this.hashChange, false);

			/**
			 * Enable scroll if decive don't have touch support
			 */
			if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				if(!('ontouchstart' in window)){
					document.body.style = "overflow: scroll;";
					document.documentElement.style = "overflow: scroll;";
				}
			}			

		} else {
			document.attachEvent('onmousewheel', this.mouseWheelAndKey, false);
			document.attachEvent('onkeyup', this.mouseWheelAndKey, false);
		}
		
		return this;
	};	

	/**
	 * Build public functions
	 * @return {[type]} [description]
	 */
	fullScroll.prototype.buildPublicFunctions = function () {
		var mTouchStart = 0;
		var mTouchEnd = 0;
		var _self = this;

		this.mouseWheelAndKey = function (event) {
			if (event.deltaY > 0 || event.keyCode == 40) {	
				_self.defaults.currentPosition ++;
				_self.changeCurrentPosition(_self.defaults.currentPosition);				
			} else if (event.deltaY < 0 || event.keyCode == 38) {
				_self.defaults.currentPosition --;
				_self.changeCurrentPosition(_self.defaults.currentPosition);	
			}
			_self.removeEvents();
		};

		this.touchStart = function (event) {
			mTouchStart = parseInt(event.changedTouches[0].clientY);
			mTouchEnd = 0;
		};

		this.touchEnd = function (event) {
			mTouchEnd = parseInt(event.changedTouches[0].clientY);
			if (mTouchEnd - mTouchStart > 100 || mTouchStart - mTouchEnd > 100) {
				if (mTouchEnd > mTouchStart) {
					_self.defaults.currentPosition --;
				} else {
					_self.defaults.currentPosition ++;					
				}
				_self.changeCurrentPosition(_self.defaults.currentPosition);
			}			
		};

		this.hashChange = function (event) {
			if (location) {
				var anchor = location.hash.replace('#', '').split('/')[0];
				if (anchor !== "") {
					if (anchor < 0) {
						_self.changeCurrentPosition(0);
					} else if (anchor > _self.defaults.maxPosition) {
						_self.changeCurrentPosition(_self.defaults.maxPosition);
					} else {
						_self.defaults.currentPosition = anchor;
						_self.animateScroll();
					}					
				}				
			}
		};

		this.removeEvents = function () {
			if (document.addEventListener) {
			document.removeEventListener('mousewheel', this.mouseWheelAndKey, false);
			document.removeEventListener('wheel', this.mouseWheelAndKey, false);
			document.removeEventListener('keyup', this.mouseWheelAndKey, false);
			document.removeEventListener('touchstart', this.touchStart, false);
			document.removeEventListener('touchend', this.touchEnd, false);

			} else {
				document.detachEvent('onmousewheel', this.mouseWheelAndKey, false);
				document.detachEvent('onkeyup', this.mouseWheelAndKey, false);
			}

			setTimeout(function(){
				_self.addEvents();
			}, 600);
		};

		this.animateScroll = function () {

			var animateTime = this.defaults.animateTime;
			var animateFunction = this.defaults.animateFunction;
			var position = this.defaults.currentPosition * 100;

			this.defaults.container.style.webkitTransform = 'translateY(-' + position + '%)';
			this.defaults.container.style.mozTransform = 'translateY(-' + position + '%)';
			this.defaults.container.style.msTransform = 'translateY(-' + position + '%)';
			this.defaults.container.style.transform = 'translateY(-' + position + '%)';
			this.defaults.container.style.webkitTransition = 'all ' + animateTime + 's ' + animateFunction;
			this.defaults.container.style.mozTransition = 'all ' + animateTime + 's ' + animateFunction;
			this.defaults.container.style.msTransition = 'all ' + animateTime + 's ' + animateFunction;
			this.defaults.container.style.transition = 'all ' + animateTime + 's ' + animateFunction;

			for (var i = 0; i < this.ul.childNodes.length; i++) {
					this.ul.childNodes[i].firstChild.classList.remove('active');
					if (i == this.defaults.currentPosition) {
					this.ul.childNodes[i].firstChild.classList.add('active');		
				}
			}
			
		// alert(left_ch);
			if(position == 0)
			{
				inde();
				pc();
				ps();
				wii();
				var left_ch1 = left_ch+100;
				var right_ch1 = rigth_ch-100;
				var button = top_ch-50;
				video2[0].pause();
				video3[0].pause();
				video4[0].pause();
				video1[0].play();
				// alert(left_ch);
				$("#content_icon1").stop().animate({
					opacity:"1",
					left:left_ch1
				},700);
				$("#inde1").stop().animate({
					opacity:"1",
					left:right_ch1
				},500).queue(function(){
					$("#inde2").stop().animate({
						opacity:"1",
						left:right_ch1
					},500).queue(function(){
					$("#inde3").stop().animate({
						opacity:"1",
						top:button
						},500);
					});;
				})
			}else if(position == 100)
			{
				inde();
				pc();
				ps();
				wii();
				var left_ch1 = left_ch+100;
				var right_ch1 = rigth_ch-100;
				var button = top_ch-50;
				video1[0].pause();
			video2[0].pause();
			video3[0].pause();
			video2[0].play();
				$("#content_icon2").stop().animate({
					opacity:"1",
					left:left_ch1
				},700);
				$("#pc1").stop().animate({
					opacity:"1",
					left:right_ch1
				},500).queue(function(){
					$("#pc2").stop().animate({
						opacity:"1",
						left:right_ch1
					},500).queue(function(){
					$("#pc3").stop().animate({
						opacity:"1",
						top:button
						});
					},500);;
				})
			}else if(position == 200)
			{
				inde();
				pc();
				ps();
				wii();
				var left_ch1 = left_ch+100;
				var right_ch1 = rigth_ch-100;
				var button = top_ch-50;
				video1[0].pause();
			video2[0].pause();
			video4[0].pause();
			video3[0].play();
				$("#content_icon3").stop().animate({
					opacity:"1",
					left:left_ch1
				},700);
				$("#ps1").stop().animate({
					opacity:"1",
					left:right_ch1
				},500).queue(function(){
					$("#ps2").stop().animate({
						opacity:"1",
						left:right_ch1
					},500).queue(function(){
					$("#ps3").stop().animate({
						opacity:"1",
						top:button
						});
					},500);;
				})
			}else if(position == 300){
				inde();
				pc();
				ps();
				wii();
				var left_ch1 = left_ch+100;
				var right_ch1 = rigth_ch-100;
				var button = top_ch-50;
				video1[0].pause();
			video2[0].pause();
			video3[0].pause();
			video4[0].play();
				$("#content_icon4").stop().animate({
					opacity:"1",
					left:left_ch1
				},700);
				$("#wii1").stop().animate({
					opacity:"1",
					left:right_ch1
				},500).queue(function(){
					$("#wii2").stop().animate({
						opacity:"1",
						left:right_ch1
					},500).queue(function(){
					$("#wii3").stop().animate({
						opacity:"1",
						top:button
						});
					},500);;
				})
			}
		};

		this.changeCurrentPosition = function (position) {
			if (position !== "") {
				_self.defaults.currentPosition = position;
				location.hash = _self.defaults.currentPosition;
			}	
		};

		return this;
	};
	window.fullScroll = fullScroll;


})();
function inde()
{
	// const left_ch = parseInt($("#content_icon1").css("left"))-100;
	// const right_ch = parseInt($("#inde1").css("left"))+100;
	const button = parseInt($("#inde3").css("top"))+50;
	// alert(left_ch);

	$("#content_icon1").css("left",left_ch);
	$("#content_icon1").css("opacity",0);

	$("#inde1").css("left", rigth_ch);
	$("#inde1").css("opacity",0);

	$("#inde2").css("left", rigth_ch);
	$("#inde2").css("opacity",0);

	$("#inde3").css("top",top_ch);
	$("#inde3").css("opacity",0);
}
function pc()
{
	// const left_ch = parseInt($("#content_icon2").css("left"))-100;
	// const right_ch = parseInt($("#pc1").css("left"))+100;
	const button = parseInt($("#pc3").css("top"))+50;


	$("#content_icon2").css("left",left_ch);
	$("#content_icon2").css("opacity",0);

	$("#pc1").css("left", rigth_ch);
	$("#pc1").css("opacity",0);

	$("#pc2").css("left", rigth_ch);
	$("#pc2").css("opacity",0);

	$("#pc3").css("top",top_ch);
	$("#pc3").css("opacity",0);
}
function ps()
{
	// const left_ch = parseInt($("#content_icon2").css("left"))-100;
	// const right_ch = parseInt($("#pc1").css("left"))+100;
	const button = parseInt($("#ps3").css("top"))+50;


	$("#content_icon3").css("left",left_ch);
	$("#content_icon3").css("opacity",0);

	$("#ps1").css("left", rigth_ch);
	$("#ps1").css("opacity",0);

	$("#ps2").css("left", rigth_ch);
	$("#ps2").css("opacity",0);

	$("#ps3").css("top",top_ch);
	$("#ps3").css("opacity",0);
}
function wii()
{
	// const left_ch = parseInt($("#content_icon2").css("left"))-100;
	// const right_ch = parseInt($("#pc1").css("left"))+100;
	const button = parseInt($("#wii3").css("top"))+50;


	$("#content_icon4").css("left",left_ch);
	$("#content_icon4").css("opacity",0);

	$("#wii1").css("left", rigth_ch);
	$("#wii1").css("opacity",0);

	$("#wii2").css("left", rigth_ch);
	$("#wii2").css("opacity",0);

	$("#wii3").css("top",top_ch);
	$("#wii3").css("opacity",0);
}