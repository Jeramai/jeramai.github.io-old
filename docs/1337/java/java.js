$(document).ready(function(){
	
if($(".comeandgetme").length == 0){	
	setTimeout(function() {
		$('.pageLoad').addClass('off');
	}, 250)
}
else
{
	$('.pageLoad').css('display','none');
}
	
var password = $("#password");
var button = $("#button");

button.mousedown(function()
{
  password.attr("type", "text");
});

button.mouseup(function()
{
  password.attr("type", "password");
});

button.mouseleave(function()
{
  password.attr("type", "password");                 
});

if(navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i) && $("#mobile").length == 0)
{
	location.replace("http://dc-ictwebs.nl/103706/1337/mobile");
}
	
// R2 ---------------------------------------------------------------------------------------------


var tolerance_ms = 500,
    start,
    end,
    clicks = 0, 
    wrong = false, 
    timeout;

$("#area").mousedown(function(e){ click(e); });

function click(e){
  if(clicks==0) {
    start = new Date();
    wrong = false;
  } else { 
    end = new Date();
    if(Math.abs((end-start)-hash[clicks])>tolerance_ms) 
      wrong = true;
  }
  status("");
  circle(e); //demo only
  clicks++;
  clearTimeout(timeout);
  timeout = setTimeout(function(){ check(); },1000);
}
  
function check(){
  //check password
  (wrong||clicks!=hash.length) ? error() : success();
  clicks = 0;
  $(".circle").remove(); //demo only
}

function success() {
  //success callback
  status("success");

  $("#area").attr('id', 'goodjob'); 
  
  $(".findmefgt").css("display","none");
  $(".findmescrb").css("display","block");
  
	$.ajax({
		type: "POST",
		data: {"data": "pizza"},
		url: "russianfantasy.php", 
		success: function(result){
			$(".gj").html(result);
		}
	});
}



function error() {
  //error callback
  status("error");
}

function status(stat) {
  $("body").attr("class", stat);
}

status("ready");

//demo only
var hash = [0, 373, 556, 724, 1173, 2038, 2463];

function showPassword(){
  status("");
  var e = {
    pageX : $(window).width()/2,
    pageY : $(window).height()/2
  };
  $.each(hash, function(){
    setTimeout(function(){
      circle(e);
    },this)
  });
}

$("#show").click(function(){ showPassword(); });

function circle(e) {
  //draw circle: for demo purposes only
  $("body").append(
    $("<div>").addClass("circle").css({
      left : e.pageX,
      top : e.pageY
    })
  );
} 
// kfc ---------------------------------------------------------
if ( window.addEventListener && $("#homepage-flag").length > 0) {
        var kkeys = [], konami = "49,54,51,56,52";
        window.addEventListener("keydown", function(e){
                kkeys.push( e.keyCode );
                if ( kkeys.toString().indexOf( konami ) >= 0 ) {
                    $.ajax({
						type: "POST",
						data: {"data": "limonade"},
						url: "cantseeme.php", 
						success: function(result){
							$(".ready").html(result);
						}
					});
                }
        }, true);
}






























});