$(document).ready(function(){
	var paperMenu = {
	$window: $('#paper-window'),
	$paperFront: $('#paper-front'),
	$hamburger: $('.hamburger'),
	offset: 1800,
	pageHeight: $('#paper-front').outerHeight(),
	
	open: function() {
		this.$window.addClass('tilt');
		this.$hamburger.off('click');
		$('#container, .hamburger').on('click', this.close.bind(this));
		this.hamburgerFix(true);
		console.log('opening...');
				$('#paper-back').css({
					'z-index': '4'
				});
	},
	close: function() {
		this.$window.removeClass('tilt'); 
		$('#container, .hamburger').off('click');
		this.$hamburger.on('click', this.open.bind(this));
		this.hamburgerFix(false);
		console.log('closing...');
				$('#paper-back').css({
					'z-index': '2'
				});
	},
	updateTransformOrigin: function() {
		scrollTop = this.$window.scrollTop();
		equation = (scrollTop + this.offset) / this.pageHeight * 100;
		this.$paperFront.css('transform-origin', 'center ' + equation + '%');
	},
	//hamburger icon fix to keep its position
	hamburgerFix: function(opening) {
			if(opening) {
				$('.hamburger').css({
					display: 'none',
					top: this.$window.scrollTop() + 30 + 'px'
				});
			} else {
				setTimeout(function() {
					$('.hamburger').css({
						position: 'fixed',
						top: '60px',
						display: 'block'
					});
				}, 300);
			}
		},
	bindEvents: function() {
		this.$hamburger.on('click', this.open.bind(this));
		$('.close').on('click', this.close.bind(this));
		this.$window.on('scroll', this.updateTransformOrigin.bind(this));
	},
	init: function() {
		this.bindEvents();
		this.updateTransformOrigin();
	},
};

paperMenu.init();



//Spectate -------------------------------------
$('.question').on('click', function(e) {
    e.preventDefault();
	  var self = $(this);
    self.toggleClass("active");
	  self.next().slideToggle(350);
});

$('.answer .close').on('click', function(e) {
  e.preventDefault();
	$(this).parent().slideUp(350);
});


//RUNES ------------------------------------------
$( ".titlerunes" ).mouseover(function() {
  $( this ).nextAll().css({
						display: 'block',
						'margin-left':'50px',
						'margin-top':'-20px'
					});
});
$( ".titlerunes" ).mouseleave(function() {
  $( this ).nextAll().css({
						display: 'none'
					});
});


//SEARCH _INDEX
$(function(){
    $("#search_intropage").find("input").css({"width": "90%"});
})


});

//FUNCTIES ----------------------------------------
function push_api() { //NOTIFICATIONS
	
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chrome!.'); 
    return;
  }
	
  if (Notification.permission !== "granted")
    Notification.requestPermission();

  var notification = new Notification($('.js-title').val(), {
    icon: $('.js-img').val(),
    body: $('.js-body').val(),
  });

  notification.onclick = function () {
    //window.open("http://jeram.ai/Jaar%203/op@20.bg");  
	//notification.close();    
  };
}
