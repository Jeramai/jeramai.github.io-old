jQuery(document).ready(function($) {
	//?
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if(!$("#masthead").hasClass("navbar-static-top")) {
			if(scroll>=1) {
				$("#masthead").addClass("navbar-fixed-top");
			} else {
				$("#masthead").removeClass("navbar-fixed-top");
			}
		}
	});

	//Scroll ALL THE WAY UP!
	$(".scroll-top").click(function() {
		$('html,body').animate( { scrollTop: 0 }, 1000);
	});

	//Scroll to the about me text
	var offset = -145;
	$("#godown").click(function() {
		$('html, body').animate({
			scrollTop: $("#about_me").offset().top + offset
		}, 2000);
	});

	//Give a random name of how cool I am
	var randomOne = [ 'awesome', 'smart', 'clever', 'epic', 'Kraygasm', 'fun', 'genius', 'good', 'fine', 'cool', 'quality', 'exciting', '1337', 'hot', 'responsive', 'friendly' ];
	setInterval(function(){
		var randomNumber = Math.floor(Math.random()*randomOne.length);
		$('.underlinetext>strong>span').text( randomOne[randomNumber] );
	}, 2000);

	//Do the ufo
	$(window).bind('scroll', function () {
		if ($(window).scrollTop() >= 500) {
			$(".scroll-top").animate({
        right: "0px",
      }, 50 );
		} else {
			$(".scroll-top").animate({
        right: "-300px",
      }, 50 );
		}
	});

	//Do the chart animation
	$(window).bind('scroll', function () {
		if ($(window).scrollTop() >= 800) {
			$('.chart_wrapper').addClass('active');
			$('.circlechart').addClass('active');
		} else {
			$('.circlechart').removeClass('active');
			$('.chart_wrapper').removeClass('active');
		}
	});

	//fade-in the portfolio tabs
	$(window).bind('scroll', function () {
		if ($(window).scrollTop() >= 1200) {
			$('.portfolio2_wrapper').addClass('active');
		} else {
			$('.portfolio2_wrapper').removeClass('active');
		}
	});

});

//Make the loader disapear after 3 sec.
$(document).ready(function() {
	$(this).scrollTop(0);
	$('html, body').css({
		'overflow': 'hidden',
		'height': '100vh'
	});
	setTimeout(function() {
		$('html, body').css({
			'overflow': 'auto',
			'height': 'auto'
		});
		$('.loader-wrapperr').addClass('loaded');
	}, 3000);
});

//When clicked on a #-link, scroll to there
$(document).on('click', 'a[href^="#"]', function(e) {
    var id = $(this).attr('href');
    var $id = $(id);
    if ($id.length === 0) {
        return;
    }
    e.preventDefault();
		var offset = -145;
    var pos = $(id).offset().top + offset;
    $('body, html').animate({scrollTop: pos}, 2000);
});
