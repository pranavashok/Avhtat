/* General Stuff */
$(document).ready(function () {
	var $oe_menu = $('#oe_menu');
	var $oe_menu_link = $('#oe_menu li ul li a');
	var $oe_menu_items = $oe_menu.children('li');
	var $oe_overlay = $('#oe_overlay');
	$oe_menu_link.click(function(){
		$(this).parent().parent().parent().fadeOut(300);
	});
	$oe_menu_items.mouseenter(function () {
		var that = $(this);
		that.addClass('slided selected');
		that.children('div').css('z-index', '9999').stop(true, true).slideDown(200, function () {
			$oe_menu_items.not('.slided').children('div').hide();
			that.removeClass('slided');
		});
	}).mouseleave(function () {
		var that = $(this);
		that.removeClass('selected').children('div').css('z-index', '1');
	});

	$oe_menu.mouseenter(function () {
		var that = $(this);
		$oe_overlay.stop(true, true).fadeTo(200, 0.6);
		that.addClass('hovered');
	}).mouseleave(function () {
		var that = $(this);
		that.removeClass('hovered');
		$oe_overlay.stop(true, true).fadeTo(200, 0);
		$oe_menu_items.children('div').hide();
	})

});
