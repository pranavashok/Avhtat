/* General Stuff */
$(document).ready(function () {
	$(".lavaLamp").lavaLamp({
			fx: "easeInOutQuad",
			speed: 300,
			click: function() {return true;}
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
    });
});
