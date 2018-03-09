$(document).ready(function(){
	
	var  mn = $(".navbar.navbar-default");
	var  mns = "navbar-fixed-top";
	var  hdr = $('#header').height(); 

	$(window).scroll(function() {
	  if( $(this).scrollTop() > (hdr+80) ) {
		mn.addClass(mns);
	  } else {
		mn.removeClass(mns);
	  }
	});
	
	$(".clickmeh").click(function() {
		$(this).children().removeClass("morethan4").toggleClass(".morethan4click");
	});
	
	$(".buttonbetaalbutton").click(function() {
		$(".betaalmijgeld").css("display","none");
		window.location = "http://dc-ictwebs.nl/103706/marktplaats/myaccount?mijn_advertenties";
	});
	
	
	$("#selectthisstuff").change(function(){
		if($(this).val() == "auto") {
		   $('.verkoop_auto, .auto_prijs').removeClass('hidemefgt');
		   $('.verkoop_pc, .verkoop_sp, .verkoop_tablet, .verkoop_tv, .verkoop_wm').addClass('hidemefgt');
		} 
		else if($(this).val() == "pc") {
		   $('.verkoop_pc').removeClass('hidemefgt');
		   $('.verkoop_auto, .verkoop_sp, .verkoop_tablet, .verkoop_tv, .verkoop_wm, .auto_prijs').addClass('hidemefgt');
		} 
		else if($(this).val() == "smartphone") {
		   $('.verkoop_sp').removeClass('hidemefgt');
		   $('.verkoop_auto, .verkoop_pc, .verkoop_tablet, .verkoop_tv, .verkoop_wm, .auto_prijs').addClass('hidemefgt');
		} 
		else if($(this).val() == "tablet") {
		   $('.verkoop_tablet').removeClass('hidemefgt');
		   $('.verkoop_auto, .verkoop_sp, .verkoop_pc, .verkoop_tv, .verkoop_wm, .auto_prijs').addClass('hidemefgt');
		} 
		else if($(this).val() == "tv") {
		   $('.verkoop_tv').removeClass('hidemefgt');
		   $('.verkoop_auto, .verkoop_sp, .verkoop_tablet, .verkoop_pc, .verkoop_wm, .auto_prijs').addClass('hidemefgt');
		} 
		else if($(this).val() == "wasmachine") {
		   $('.verkoop_wm').removeClass('hidemefgt');
		   $('.verkoop_auto, .verkoop_sp, .verkoop_tablet, .verkoop_tv, .verkoop_pc, .auto_prijs').addClass('hidemefgt');
		} 
		else {
		}
	});
	
	$("#biedenjanee").change(function(){
		if($(this).val() == "Ja") {
		   $('.hint2').removeClass('hidemefgt');
		}
		else{
		   $('.hint2').addClass('hidemefgt');
		}
	});
});