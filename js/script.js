/* General Stuff */
var timer1 = null,
	start = 0,
	cur = 0;

function init(){
	midx = document.width/2;
	footerlinks.style.left = (midx - 470) + 'px'
	contacts.style.left = (midx-280) + 'px'
	nitc.style.left = (midx+295) + 'px'
	initiatives.style.left = (midx-360) + 'px'
}

$(document).ready(function () {
	$("#q.searchbox").focus(function() {
			this.value='';
			$("#suggestions").show();
		});
	$("#q.searchbox").blur(function() {
			this.value='tathva instant';
			//$("#suggestions").hide();
		});
	$(":not(#searchcontainer)").click(function() {
			$("#suggestions").hide();
		});
	$(".lavaLamp").lavaLamp({
		fx: "swing",
		click: function () {
			timer1 = null;
			start = $("#nav-icons li.current").attr('id');
			$("#panel" + start).stop(true, true).fadeOut(200);
			$(".lavaLamp li").removeClass('current');
			$(this).addClass('current');
			$("#panel" + $("#nav-icons li.current").attr('id')).stop(true, true).fadeIn(500);
			return true;
		}
	});
	$(".lavaLamp").lavaLamp({
		linum: 0
	});
	var $oe_menu = $('.oe_menu');
	var $oe_menu_items = $oe_menu.children('li');
	var $oe_overlay = $('#oe_overlay');
	$oe_overlay.css({
		zIndex: '40'
	});
	$oe_menu_items.bind('mouseenter', function () {
		var $this = $(this);
		$this.addClass('slided selected');
		$this.children('div').css('z-index', '9999').stop(true, true).slideDown(200, function () {
			$oe_menu_items.not('.slided').children('div').hide();
			$this.removeClass('slided');
		});
	}).bind('mouseleave', function () {
		var $this = $(this);
		$this.removeClass('selected').children('div').css('z-index', '1');
		$oe_menu_items.not('.slided').children('div').hide();
	});
	$oe_menu.bind('mouseenter', function () {
		var $this = $(this);
		$oe_overlay.show();
		$oe_overlay.stop(true, true).fadeTo(200, 0.6);
		$this.addClass('hovered');
	}).bind('mouseleave', function () {
		var $this = $(this);
		$this.removeClass('hovered');
		$oe_overlay.stop(true, true).fadeTo(200, 0, function () {
			$oe_overlay.hide();
		});
		$oe_menu_items.children('div').hide();
	})
	$(".oe_menu ul li a").click(function () {
		$oe_menu_items.children('div').hide();
		$oe_overlay.hide();
	});
	$(".ilinks li").click(function () {
		$(".ilinks li").removeClass("selected");
		$(this).addClass("selected");
	});
	$("#panels li").hide();
	$("#panels li:eq(0)").show();
	$("#sponsslider").easySlider({
		auto: true,
		continuous: true
	});
	$("#contactsbutton").click(function () {
		cur++;
		if (cur % 2 == 0) pos = 0;
		else pos = ($(document).height() - $(window).height());
		$('html, body').stop(true, true).animate({
			scrollTop: pos,
			queue: false
		}, 1500, 'easeOutSine');
	});
	timer = null;
	timer1 = setTimeout('cycle()', 8000);
	$oe_overlay.hide();
	//ticker($('#ticker-wrapper ul'),'slide',2000);
	$("#footer").css({bottom: -$("#footer").height()});
	$("#frontpage").css({marginTop: ($(window).height()-580)/2+20});
	$(document).mousemove(function(e){
		h = document.height;
		mintop = 60;
		maxtop = 140;
		target = (e.pageY/h)*400;
		if(target<mintop) target = mintop;
		else if(target>maxtop) target = maxtop;
		$('#sidebar-puller').css({top:target+'px'});
	});
	$('#initiate').click(function(){
		$('#footerlinks').animate({left:(($(document).width()/2)-570) + 'px'},1000,function(){
		$('#initiatives').show('slow');});
		
	});
});


function bindLinks() {
	var i = 0;
	var count = $(".ilinks li").length;
	$(".isection").hide();
	$(".icontent div:eq(0)").fadeIn('slow');
	$(".ilinks li:eq(0)").addClass('selected');
	while (i < count) {
		$(".ilinks li").bind('click', function () {
			$(".ilinks li").removeClass('selected');
			$(this).addClass('selected');
			$(".isection").hide();
			$("#isection" + $(this).attr('id')).fadeIn(200, function () {
				$("#imcs_container").mCustomScrollbar("vertical", 400, "easeOutCirc", 1.05, "auto", "yes", "yes", 10);
			});
		});
		i++;
	}
	$("#ititle").bind('click', function () {
		$(".ilinks li").removeClass('selected');
		$(".isection").hide();
		$(".icontent div:eq(0)").fadeIn('slow');
		$(".ilinks li:eq(0)").addClass('selected');
	});
	$("#imcs_container").mCustomScrollbar("vertical", 400, "easeOutCirc", 1.05, "auto", "yes", "yes", 10);
}

function cycle() {
	timer1 = null;
	start++;
	var count = $(".lavaLamp li").length - 2;
	if (start >= count) start = 0;
	$("#panel" + $("#nav-icons li.current").attr('id')).stop(true, true).fadeOut(200);
	$(".lavaLamp li").removeClass('current');
	$(".lavaLamp li:eq(" + start + ")").addClass('current');
	$("#panel" + $("#nav-icons li.current").attr('id')).stop(true, true).fadeIn(500);
	timer1 = setTimeout('cycle()', 8000);
}
function ticker(obj,effect,speed){
      var list = obj.children();
      list.not(':first').hide();
      setInterval(function(){
        
        list = obj.children();
        list.not(':first').hide();
        
        var first_li = list.eq(0)
        var second_li = list.eq(1)
		
		if(effect == 'slide'){
			first_li.slideUp(500,function(){
			second_li.slideDown(500,function(){
				first_li.remove().appendTo(obj);
			});
			});
		} else if(effect == 'fade'){
			first_li.fadeOut(function(){
				second_li.fadeIn('slow');
				first_li.remove().appendTo(obj);
			});
		}
      }, speed);
}
function register() {
	var data = 'name=' + $('#name').attr('value') + '&email=' + $('#email').attr('value') + '&phone=' + $('#phone').attr('value') + '&password=' + $('#password').attr('value')+ '&password2=' + $('#password2').attr('value')+ '&institution=' + $('#institution').attr('value') ;
	$.ajax({
		url: "register.php",	
		type: "POST",		
		data: data,		
		cache: false,
		success: function (html) {	
		$('#stylized').html(html);
		$('#innerpage').fadeIn('slow');		
		bindLinks();
	}		
	});
}
function getid() {
	var data = 'item=id' + '&email=' + $('#email').attr('value') + '&phone=' + $('#phone').attr('value');
	$.ajax({
		url: "retrieve.php",	
		type: "POST",		
		data: data,		
		cache: false,
		success: function (html) {	
		$('#stylized').html(html);
		$('#innerpage').fadeIn('slow');		
	}		
	});
	
}
function getpass() {
	var data = 'item=pass' + '&email=' + $('#email').attr('value') + '&phone=' + $('#phone').attr('value');
	$.ajax({
		url: "retrieve.php",	
		type: "POST",		
		data: data,		
		cache: false,
		success: function (html) {	
		$('#stylized').html(html);
		$('#innerpage').fadeIn('slow');		
	}		
	});
	
}
function resetpass() {
	if ($('#password').attr('value') == $('#password2').attr('value')){
	str=document.location.search;
	mailid=str.split('&')[0].split('=')[1];
	hash= str.split('&')[1].split('=')[1];
	var data = 'email=' + mailid + '&hash=' + hash + '&password=' + $('#password').attr('value');;
	$.ajax({
		url: "reset.php",	
		type: "POST",		
		data: data,		
		cache: false,
		success: function (html) {	
		$('#stylized').html(html);
		$('#innerpage').fadeIn('slow');		
	}		
	});
	} else{
		alert('Passwords do not match. Please re-enter.');
	}
}
function feedback() {
			var data = 'name=' + $('#name').attr('value') + '&email=' + $('#email').attr('value') + '&feedback=' + $('#feedback').attr('value');
			$.ajax({
				url: "feedback.php",	
				type: "POST",		
				data: data,		
				cache: false,
				success: function (html) {	
					$('#stylized').html(html);
					$('#innerpage').fadeIn('slow');		
					bindLinks();
		
				}		
			});
		}
function loadVerify(data) {
			$.ajax({
				url: "verify.php",	
				type: "GET",		
				data: data,		
				cache: false,
				success: function (html) {	
					$('#frontpage').hide();	
					$('#innerpage').fadeIn('slow');	
					$('#content').html(html);
				}		
			});
		}
function lookup(inputString) {
		if(inputString.length == 0) {
			$('#suggestions').fadeOut(); // Hide the suggestions box
		} else {
			$('#suggestions').fadeIn(); // Show the suggestions box
			$("#s-loader").show();
			$.post("rpc.php", {queryString: ""+inputString+""}, function(data) { // Do an AJAX call
				$('#suggestions').html(data); // Fill the suggestions box
				$("#s-loader").hide();
      			});
   		}
	}
