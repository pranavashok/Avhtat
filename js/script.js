/* General Stuff */
$(document).ready(function () {

	$(".lavaLamp").lavaLamp({
			fx: "swing",
			click: function() {
			$(".lavaLamp li").removeClass('current');
			$(this).addClass('current');
			$("#panels li").explode();
			$("#panel"+$("#nav-icons li.current").attr('id')).fadeIn('slow');
			return true;}
	});
	$(".lavaLamp").lavaLamp({ linum: 0 });
    var $oe_menu = $('#oe_menu');
    var $oe_menu_items = $oe_menu.children('li');
    var $oe_overlay = $('#oe_overlay');
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
        $oe_overlay.stop(true, true).fadeTo(200, 0, function(){
	$oe_overlay.hide();        });
	$oe_menu_items.children('div').hide();
    })
    $(".oe_menu ul li a").click(function(){
	 $oe_menu_items.children('div').hide();	
	 $oe_overlay.hide(); 
    });
    $(".ilinks li").click(function() {
    	$(".ilinks li").removeClass("selected");
    	$(this).addClass("selected");
    });
   /* $('#panels').coinslider({
	spw:5,
	sph:5, 
	sDelay:	40,
	width:600,
	height:320,
	hoverPause: false });*/
   $("#panels li").hide();
   $("#panels li:eq(0)").show();
   //$("#nav-icons li").click(function() {
   //	$("#nav-icons li").removeClass('selected');
   //	$(this).addClass('selected');
   //	$("#panels li").fadeOut('slow');
   //	$("#panels li:eq("+($(this).attr('id')+")").fadeIn('slow');
   //});
});

function bindLinks(){
	var i=0;
	var count = $(".ilinks li").length;
	$(".isection").hide();
	$(".icontent div:eq(0)").fadeIn('slow');
	while(i<count){
		$(".ilinks li").bind('click',function(){
			$(".ilinks li").removeClass('selected');
			$(this).addClass('selected');
			$(".isection").hide();
			$("#isection"+$(this).attr('id')).fadeIn('fast', function(){
				$("#imcs_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10);
			});
		});	
		i++;
	}	
	$("#ititle").bind('click', function(){
			$(".ilinks li").removeClass('selected');
			$(".isection").hide();
			$(".icontent div:eq(0)").fadeIn('slow');
	});
	$("#imcs_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10);
        
}
