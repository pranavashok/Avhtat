/*
 * 	Easy Slider 1.7 - jQuery plugin
 *	written by Alen Grakalic	
 *	http://cssglobe.com/post/4004/easy-slider-15-the-easiest-jquery-plugin-for-sliding
 *
 *	Copyright (c) 2009 Alen Grakalic (http://cssglobe.com)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */

(function($) {

	$.fn.easySlider = function(options){
	  
		// default configuration properties
		var defaults = {			
			prevId: 		'prevBtn',
			prevText: 		'Previous',
			nextId: 		'nextBtn',	
			nextText: 		'Next',
			controlsShow:	true,
			controlsBefore:	'',
			controlsAfter:	'',	
			controlsFade:	true,
			firstId: 		'firstBtn',
			firstText: 		'First',
			firstShow:		false,
			lastId: 		'lastBtn',	
			lastText: 		'Last',
			lastShow:		false,				
			vertical:		false,
			speed: 			800,
			auto:			false,
			pause:			2000,
			continuous:		false, 
			numeric: 		false,
			numericId: 		'controls'
		}; 
		
		var options = $.extend(defaults, options);  
				
		this.each(function() {  
			var obj = $(this); 				
			var s = $("li", obj).length;
			var w = $("li", obj).width(); 
			var h = $("li", obj).height(); 
			var clickable = true;
			obj.width(w); 
			obj.height(h); 
			obj.css("overflow","hidden");
			var ts = s-1;
			var t = 0;
			$("ul", obj).css('width',s*w);			
			
			if(options.continuous){
				$("ul", obj).prepend($("ul li:last-child", obj).clone().css("margin-left","-"+ w +"px"));
				$("ul", obj).append($("ul li:nth-child(2)", obj).clone());
				$("ul", obj).css('width',(s+1)*w);
			};				
			
			if(!options.vertical) $("li", obj).css('float','left');
								
			if(options.controlsShow){
				var html = options.controlsBefore;				
				if(options.numeric){
					html += '<ol id="'+ options.numericId +'"></ol>';
				} else {
					if(options.firstShow) html += '<span id="'+ options.firstId +'"><a href=\"javascript:void(0);\">'+ options.firstText +'</a></span>';
					if(options.lastShow) html += ' <span id="'+ options.lastId +'"><a href=\"javascript:void(0);\">'+ options.lastText +'</a></span>';				
				};
				
				html += options.controlsAfter;						
				$(obj).after(html);										
			};
			
			if(options.numeric){									
				for(var i=0;i<s;i++){						
					$(document.createElement("li"))
						.attr('id',options.numericId + (i+1))
						.html('<a rel='+ i +' href=\"javascript:void(0);\">'+ (i+1) +'</a>')
						.appendTo($("#"+ options.numericId))
						.click(function(){							
							animate($("a",$(this)).attr('rel'),true);
						}); 												
				};							
			} else {
				$("a","#"+options.nextId).click(function(){		
					animate("next",true);
				});
				$("a","#"+options.prevId).click(function(){		
					animate("prev",true);				
				});	
				$("a","#"+options.firstId).click(function(){		
					animate("first",true);
				});				
				$("a","#"+options.lastId).click(function(){		
					animate("last",true);				
				});				
			};
			
			function setCurrent(i){
				i = parseInt(i)+1;
				$("li", "#" + options.numericId).removeClass("current");
				$("li#" + options.numericId + i).addClass("current");
			};
			
			function adjust(){
				if(t>ts) t=0;		
				if(t<0) t=ts;	
				if(!options.vertical) {
					$("ul",obj).css("margin-left",(t*w*-1));
				} else {
					$("ul",obj).css("margin-left",(t*h*-1));
				}
				clickable = true;
				if(options.numeric) setCurrent(t);
			};
			
			function animate(dir,clicked){
				if (clickable){
					clickable = false;
					var ot = t;				
					switch(dir){
						case "next":
							t = (ot>=ts) ? (options.continuous ? t+1 : ts) : t+1;						
							break; 
						case "prev":
							t = (t<=0) ? (options.continuous ? t-1 : 0) : t-1;
							break; 
						case "first":
							t = 0;
							break; 
						case "last":
							t = ts;
							break; 
						default:
							t = dir;
							break; 
					};	
					var diff = Math.abs(ot-t);
					var speed = diff*options.speed;						
					if(!options.vertical) {
						p = (t*w*-1);
						$("ul",obj).animate(
							{ marginLeft: p }, 
							{ queue:false, duration:speed, complete:adjust }
						);				
					} else {
						p = (t*h*-1);
						$("ul",obj).animate(
							{ marginTop: p }, 
							{ queue:false, duration:speed, complete:adjust }
						);					
					};
					
					if(!options.continuous && options.controlsFade){					
						if(t==ts){
							$("a","#"+options.nextId).hide();
							$("a","#"+options.lastId).hide();
						} else {
							$("a","#"+options.nextId).show();
							$("a","#"+options.lastId).show();					
						};
						if(t==0){
							$("a","#"+options.prevId).hide();
							$("a","#"+options.firstId).hide();
						} else {
							$("a","#"+options.prevId).show();
							$("a","#"+options.firstId).show();
						};					
					};				
					
					if(clicked) clearTimeout(timeout);
					if(options.auto && dir=="next" && !clicked){;
						timeout = setTimeout(function(){
							animate("next",false);
						},diff*options.speed+options.pause);
					};
			
				};
				
			};
			// init
			var timeout;
			if(options.auto){;
				timeout = setTimeout(function(){
					animate("next",false);
				},options.pause);
			};		
			
			if(options.numeric) setCurrent(0);
		
			if(!options.continuous && options.controlsFade){					
				$("a","#"+options.prevId).hide();
				$("a","#"+options.firstId).hide();				
			};				
			
		});
	  
	};

})(jQuery);


/* easySlider1.7.js ends here */

// tipsy, facebook style tooltips for jquery
// version 1.0.0a
// (c) 2008-2010 jason frame [jason@onehackoranother.com]
// released under the MIT license

(function($) {
    
    function maybeCall(thing, ctx) {
        return (typeof thing == 'function') ? (thing.call(ctx)) : thing;
    };
    
    function Tipsy(element, options) {
        this.$element = $(element);
        this.options = options;
        this.enabled = true;
        this.fixTitle();
    };
    
    Tipsy.prototype = {
        show: function() {
            var title = this.getTitle();
            if (title && this.enabled) {
                var $tip = this.tip();
                
                $tip.find('.tipsy-inner')[this.options.html ? 'html' : 'text'](title);
                $tip[0].className = 'tipsy'; // reset classname in case of dynamic gravity
                $tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).prependTo(document.body);
                
                var pos = $.extend({}, this.$element.offset(), {
                    width: this.$element[0].offsetWidth,
                    height: this.$element[0].offsetHeight
                });
                
                var actualWidth = $tip[0].offsetWidth,
                    actualHeight = $tip[0].offsetHeight,
                    gravity = maybeCall(this.options.gravity, this.$element[0]);
                
                var tp;
                switch (gravity.charAt(0)) {
                    case 'n':
                        tp = {top: pos.top + pos.height + this.options.offset, left: pos.left + pos.width / 2 - actualWidth / 2};
                        break;
                    case 's':
                        tp = {top: pos.top - actualHeight - this.options.offset, left: pos.left + pos.width / 2 - actualWidth / 2};
                        break;
                    case 'e':
                        tp = {top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth - this.options.offset};
                        break;
                    case 'w':
                        tp = {top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width + this.options.offset};
                        break;
                }
                
                if (gravity.length == 2) {
                    if (gravity.charAt(1) == 'w') {
                        tp.left = pos.left + pos.width / 2 - 15;
                    } else {
                        tp.left = pos.left + pos.width / 2 - actualWidth + 15;
                    }
                }
                
                $tip.css(tp).addClass('tipsy-' + gravity);
                $tip.find('.tipsy-arrow')[0].className = 'tipsy-arrow tipsy-arrow-' + gravity.charAt(0);
                if (this.options.className) {
                    $tip.addClass(maybeCall(this.options.className, this.$element[0]));
                }
                
                if (this.options.fade) {
                    $tip.stop().css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: this.options.opacity});
                } else {
                    $tip.css({visibility: 'visible', opacity: this.options.opacity});
                }
            }
        },
        
        hide: function() {
            if (this.options.fade) {
                this.tip().stop().fadeOut(function() { $(this).remove(); });
            } else {
                this.tip().remove();
            }
        },
        
        fixTitle: function() {
            var $e = this.$element;
            if ($e.attr('title') || typeof($e.attr('original-title')) != 'string') {
                $e.attr('original-title', $e.attr('title') || '').removeAttr('title');
            }
        },
        
        getTitle: function() {
            var title, $e = this.$element, o = this.options;
            this.fixTitle();
            var title, o = this.options;
            if (typeof o.title == 'string') {
                title = $e.attr(o.title == 'title' ? 'original-title' : o.title);
            } else if (typeof o.title == 'function') {
                title = o.title.call($e[0]);
            }
            title = ('' + title).replace(/(^\s*|\s*$)/, "");
            return title || o.fallback;
        },
        
        tip: function() {
            if (!this.$tip) {
                this.$tip = $('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');
            }
            return this.$tip;
        },
        
        validate: function() {
            if (!this.$element[0].parentNode) {
                this.hide();
                this.$element = null;
                this.options = null;
            }
        },
        
        enable: function() { this.enabled = true; },
        disable: function() { this.enabled = false; },
        toggleEnabled: function() { this.enabled = !this.enabled; }
    };
    
    $.fn.tipsy = function(options) {
        
        if (options === true) {
            return this.data('tipsy');
        } else if (typeof options == 'string') {
            var tipsy = this.data('tipsy');
            if (tipsy) tipsy[options]();
            return this;
        }
        
        options = $.extend({}, $.fn.tipsy.defaults, options);
        
        function get(ele) {
            var tipsy = $.data(ele, 'tipsy');
            if (!tipsy) {
                tipsy = new Tipsy(ele, $.fn.tipsy.elementOptions(ele, options));
                $.data(ele, 'tipsy', tipsy);
            }
            return tipsy;
        }
        
        function enter() {
            var tipsy = get(this);
            tipsy.hoverState = 'in';
            if (options.delayIn == 0) {
                tipsy.show();
            } else {
                tipsy.fixTitle();
                setTimeout(function() { if (tipsy.hoverState == 'in') tipsy.show(); }, options.delayIn);
            }
        };
        
        function leave() {
            var tipsy = get(this);
            tipsy.hoverState = 'out';
            if (options.delayOut == 0) {
                tipsy.hide();
            } else {
                setTimeout(function() { if (tipsy.hoverState == 'out') tipsy.hide(); }, options.delayOut);
            }
        };
        
        if (!options.live) this.each(function() { get(this); });
        
        if (options.trigger != 'manual') {
            var binder   = options.live ? 'live' : 'bind',
                eventIn  = options.trigger == 'hover' ? 'mouseenter' : 'focus',
                eventOut = options.trigger == 'hover' ? 'mouseleave' : 'blur';
            this[binder](eventIn, enter)[binder](eventOut, leave);
        }
        
        return this;
        
    };
    
    $.fn.tipsy.defaults = {
        className: null,
        delayIn: 0,
        delayOut: 0,
        fade: false,
        fallback: '',
        gravity: 'n',
        html: false,
        live: false,
        offset: 0,
        opacity: 0.8,
        title: 'title',
        trigger: 'hover'
    };
    
    // Overwrite this method to provide options on a per-element basis.
    // For example, you could store the gravity in a 'tipsy-gravity' attribute:
    // return $.extend({}, options, {gravity: $(ele).attr('tipsy-gravity') || 'n' });
    // (remember - do not modify 'options' in place!)
    $.fn.tipsy.elementOptions = function(ele, options) {
        return $.metadata ? $.extend({}, options, $(ele).metadata()) : options;
    };
    
    $.fn.tipsy.autoNS = function() {
        return $(this).offset().top > ($(document).scrollTop() + $(window).height() / 2) ? 's' : 'n';
    };
    
    $.fn.tipsy.autoWE = function() {
        return $(this).offset().left > ($(document).scrollLeft() + $(window).width() / 2) ? 'e' : 'w';
    };
    
    /**
     * yields a closure of the supplied parameters, producing a function that takes
     * no arguments and is suitable for use as an autogravity function like so:
     *
     * @param margin (int) - distance from the viewable region edge that an
     *        element should be before setting its tooltip's gravity to be away
     *        from that edge.
     * @param prefer (string, e.g. 'n', 'sw', 'w') - the direction to prefer
     *        if there are no viewable region edges effecting the tooltip's
     *        gravity. It will try to vary from this minimally, for example,
     *        if 'sw' is preferred and an element is near the right viewable 
     *        region edge, but not the top edge, it will set the gravity for
     *        that element's tooltip to be 'se', preserving the southern
     *        component.
     */
     $.fn.tipsy.autoBounds = function(margin, prefer) {
		return function() {
			var dir = {ns: prefer[0], ew: (prefer.length > 1 ? prefer[1] : false)},
			    boundTop = $(document).scrollTop() + margin,
			    boundLeft = $(document).scrollLeft() + margin,
			    $this = $(this);

			if ($this.offset().top < boundTop) dir.ns = 'n';
			if ($this.offset().left < boundLeft) dir.ew = 'w';
			if ($(window).width() + $(document).scrollLeft() - $this.offset().left < margin) dir.ew = 'e';
			if ($(window).height() + $(document).scrollTop() - $this.offset().top < margin) dir.ns = 's';

			return dir.ns + (dir.ew ? dir.ew : '');
		}
	};
    
})(jQuery);

/* jquery.tipsy.js ends here */


/**
 * LavaLamp - A menu plugin for jQuery with cool hover effects.
 * @requires jQuery v1.2.x
 *
 * http://nixbox.com/lavalamp.php
 *
 * Copyright (c) 2008 Jolyon Terwilliger (nixbox.com)
 * Original code Copyright (c) 2007 Ganeshji Marwaha (gmarwaha.com)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * original version for mootools by Guillermo Rauch
 *
 * Version: 1.0 - adapted for jQuery 1.2.x series
 * Version: 1.1 - added linum parameter
 * Version: 1.2 - modified to support vertical resizing of elements
 */

(function($) {
$.fn.lavaLamp = function(o) {
    o = $.extend({ fx: "linear", speed: 500, click: function(){}, linum: 0 }, o || {});

    return this.each(function() {
        var me = $(this),
			noop = function(){},
        	$back = $('<li class="back"><div class="left"></div><div class="bottom"></div><div class="corner"></div></li>').appendTo(me),
        	$li = $("li", this), 
			curr = $("li.current", this)[0] || $($li[o.linum]).addClass("current")[0];

        $li.not(".back").hover(function() {
            move(this);
        }, noop);

        $(this).hover(noop, function() {
            move(curr);
        });

        $li.click(function(e) {
            setCurr(this);
            return o.click.apply(this, [e, this]);
        });

        setCurr(curr);

        function setCurr(el) {
            //page load hack
			$back.css({ "left": el.offsetLeft+"px", "width": "60px", "height": "40px", "top": el.offsetTop+"px" });
			//actual
			//$back.css({ "left": el.offsetLeft+"px", "width": el.offsetWidth+"px", "height": el.offsetHeight+"px", "top": el.offsetTop+"px" });
			
            curr = el;
        };

        function move(el) { 
			$back.stop()  // patch from http://www.gmarwaha.com/blog/?p=7 , comment 91
            .animate({
                width: el.offsetWidth,
                left: el.offsetLeft,
				height: el.offsetHeight,
				top: el.offsetTop
            }, o.speed, o.fx);
        };

    });
};
})(jQuery);

/* jquery.lavalamp.1.2.js ends here */

/* malihu custom scrollbar plugin - http://manos.malihu.gr */
(function ($) {
$.fn.mCustomScrollbar = function (scrollType,animSpeed,easeType,bottomSpace,draggerDimType,mouseWheelSupport,scrollBtnsSupport,scrollBtnsSpeed){
	var id = $(this).attr("id");
	var $customScrollBox=$("#"+id+" .icustomScrollBox");
	var $customScrollBox_container=$("#"+id+" .icustomScrollBox .icontainer");
	var $customScrollBox_content=$("#"+id+" .icustomScrollBox .icontent");
	var $dragger_container=$("#"+id+" .idragger_container");
	var $dragger=$("#"+id+" .idragger");
	var $scrollUpBtn=$("#"+id+" .iscrollUpBtn");
	var $scrollDownBtn=$("#"+id+" .iscrollDownBtn");
//	var $customScrollBox_horWrapper=$("#"+id+" .icustomScrollBox .horWrapper");
	
	//get & store minimum dragger height & width (defined in css)
	if(!$customScrollBox.data("minDraggerHeight")){
		$customScrollBox.data("minDraggerHeight",$dragger.height());
	}
/*	if(!$customScrollBox.data("minDraggerWidth")){
		$customScrollBox.data("minDraggerWidth",$dragger.width());
	}
*/	
	//get & store original content height & width
	if(!$customScrollBox.data("contentHeight")){
		$customScrollBox.data("contentHeight",$customScrollBox_container.height());
	}
/*	if(!$customScrollBox.data("contentWidth")){
		$customScrollBox.data("contentWidth",$customScrollBox_container.width());
	}
*/	
	CustomScroller();
	
	function CustomScroller(reloadType){
		//horizontal scrolling ------------------------------
/*		if(scrollType=="horizontal"){
			var visibleWidth=$customScrollBox.width();
			//set content width automatically
			$customScrollBox_horWrapper.css("width",999999); //set a rediculously high width value ;)
			$customScrollBox.data("totalContent",$customScrollBox_container.width()); //get inline div width
			$customScrollBox_horWrapper.css("width",$customScrollBox.data("totalContent")); //set back the proper content width value
			
			if($customScrollBox_container.width()>visibleWidth){ //enable scrollbar if content is long
				$dragger.css("display","block");
				if(reloadType!="resize" && $customScrollBox_container.width()!=$customScrollBox.data("contentWidth")){
					$dragger.css("left",0);
					$customScrollBox_container.css("left",0);
					$customScrollBox.data("contentWidth",$customScrollBox_container.width());
				}
				$dragger_container.css("display","block");
				$scrollDownBtn.css("display","inline-block");
				$scrollUpBtn.css("display","inline-block");
				var totalContent=$customScrollBox_content.width();
				var minDraggerWidth=$customScrollBox.data("minDraggerWidth");
				var draggerContainerWidth=$dragger_container.width();
		
				function AdjustDraggerWidth(){
					if(draggerDimType=="auto"){
						var adjDraggerWidth=Math.round(totalContent-((totalContent-visibleWidth)*1.3)); //adjust dragger width analogous to content
						if(adjDraggerWidth<=minDraggerWidth){ //minimum dragger width
							$dragger.css("width",minDraggerWidth+"px");
						} else if(adjDraggerWidth>=draggerContainerWidth){
							$dragger.css("width",draggerContainerWidth-10+"px");
						} else {
							$dragger.css("width",adjDraggerWidth+"px");
						}
					}
				}
				AdjustDraggerWidth();
		
				var targX=0;
				var draggerWidth=$dragger.width();
				$dragger.draggable({ 
					axis: "x", 
					containment: "parent", 
					drag: function(event, ui) {
						ScrollX();
					}, 
					stop: function(event, ui) {
						DraggerRelease();
					}
				});
			
				$dragger_container.click(function(e) {
					var $this=$(this);
					var mouseCoord=(e.pageX - $this.offset().left);
					if(mouseCoord<$dragger.position().left || mouseCoord>($dragger.position().left+$dragger.width())){
						var targetPos=mouseCoord+$dragger.width();
						if(targetPos<$dragger_container.width()){
							$dragger.css("left",mouseCoord);
							ScrollX();
						} else {
							$dragger.css("left",$dragger_container.width()-$dragger.width());
							ScrollX();
						}
					}
				});

				//mousewheel
				$(function($) {
					if(mouseWheelSupport=="yes"){
						$customScrollBox.unbind("mousewheel");
						$customScrollBox.bind("mousewheel", function(event, delta) {
							var vel = Math.abs(delta*10);
							$dragger.css("left", $dragger.position().left-(delta*vel));
							ScrollX();
							if($dragger.position().left<0){
								$dragger.css("left", 0);
								$customScrollBox_container.stop();
								ScrollX();
							}
							if($dragger.position().left>$dragger_container.width()-$dragger.width()){
								$dragger.css("left", $dragger_container.width()-$dragger.width());
								$customScrollBox_container.stop();
								ScrollX();
							}
							return false;
						});
					}
				});
				
				//scroll buttons
				if(scrollBtnsSupport=="yes"){
					$scrollDownBtn.mouseup(function(){
						BtnsScrollXStop();
					}).mousedown(function(){
						BtnsScrollX("down");
					}).mouseout(function(){
						BtnsScrollXStop();
					});
				
					$scrollUpBtn.mouseup(function(){
						BtnsScrollXStop();
					}).mousedown(function(){
						BtnsScrollX("up");
					}).mouseout(function(){
						BtnsScrollXStop();
					});
				
					$scrollDownBtn.click(function(e) {
						e.preventDefault();
					});
					$scrollUpBtn.click(function(e) {
						e.preventDefault();
					});
				
					btnsScrollTimerX=0;
				
					function BtnsScrollX(dir){
						if(dir=="down"){
							var btnsScrollTo=$dragger_container.width()-$dragger.width();
							var scrollSpeed=Math.abs($dragger.position().left-btnsScrollTo)*(100/scrollBtnsSpeed);
							$dragger.stop().animate({left: btnsScrollTo}, scrollSpeed,"linear");
						} else {
							var btnsScrollTo=0;
							var scrollSpeed=Math.abs($dragger.position().left-btnsScrollTo)*(100/scrollBtnsSpeed);
							$dragger.stop().animate({left: -btnsScrollTo}, scrollSpeed,"linear");
						}
						clearInterval(btnsScrollTimerX);
						btnsScrollTimerX = setInterval( ScrollX, 20);
					}
				
					function BtnsScrollXStop(){
						clearInterval(btnsScrollTimerX);
						$dragger.stop();
					}
				}

				//scroll
				var scrollAmount=(totalContent-visibleWidth)/(draggerContainerWidth-draggerWidth);
				function ScrollX(){
					var draggerX=$dragger.position().left;
					var targX=-draggerX*scrollAmount;
					var thePos=$customScrollBox_container.position().left-targX;
					$customScrollBox_container.stop().animate({left: "-="+thePos}, animSpeed, easeType);
				}
			} else { //disable scrollbar if content is short
				$dragger.css("left",0).css("display","none"); //reset content scroll
				$customScrollBox_container.css("left",0);
				$dragger_container.css("display","none");
				$scrollDownBtn.css("display","none");
				$scrollUpBtn.css("display","none");
			}
		//vertical scrolling ------------------------------
		} else {
*/			var visibleHeight=$customScrollBox.height();
			if($customScrollBox_container.height()>visibleHeight){ //enable scrollbar if content is long
				$dragger.css("display","block");
				if(reloadType!="resize" && $customScrollBox_container.height()!=$customScrollBox.data("contentHeight")){
					$dragger.css("top",0);
					$customScrollBox_container.css("top",0);
					$customScrollBox.data("contentHeight",$customScrollBox_container.height());
				}
				$dragger_container.css("display","block");
				$scrollDownBtn.css("display","inline-block");
				$scrollUpBtn.css("display","inline-block");
				var totalContent=$customScrollBox_content.height();
				var minDraggerHeight=$customScrollBox.data("minDraggerHeight");
				var draggerContainerHeight=$dragger_container.height();
		
				function AdjustDraggerHeight(){
					if(draggerDimType=="auto"){
						var adjDraggerHeight=Math.round(totalContent-((totalContent-visibleHeight)*1.3)); //adjust dragger height analogous to content
						if(adjDraggerHeight<=minDraggerHeight){ //minimum dragger height
							$dragger.css("height",minDraggerHeight+"px").css("line-height",minDraggerHeight+"px");
						} else if(adjDraggerHeight>=draggerContainerHeight){
							$dragger.css("height",draggerContainerHeight-10+"px").css("line-height",draggerContainerHeight-10+"px");
						} else {
							$dragger.css("height",adjDraggerHeight+"px").css("line-height",adjDraggerHeight+"px");
						}
					}
				}
				AdjustDraggerHeight();
		
				var targY=0;
				var draggerHeight=$dragger.height();
				$dragger.draggable({ 
					axis: "y", 
					containment: "parent", 
					drag: function(event, ui) {
						Scroll();
					}, 
					stop: function(event, ui) {
						DraggerRelease();
					}
				});
				
				$dragger_container.click(function(e) {
					var $this=$(this);
					var mouseCoord=(e.pageY - $this.offset().top);
					if(mouseCoord<$dragger.position().top || mouseCoord>($dragger.position().top+$dragger.height())){
						var targetPos=mouseCoord+$dragger.height();
						if(targetPos<$dragger_container.height()){
							$dragger.css("top",mouseCoord);
							Scroll();
						} else {
							$dragger.css("top",$dragger_container.height()-$dragger.height());
							Scroll();
						}
					}
				});

				//mousewheel
				$(function($) {
					if(mouseWheelSupport=="yes"){
						$customScrollBox.unbind("mousewheel");
						$customScrollBox.bind("mousewheel", function(event, delta) {
							var vel = Math.abs(delta*10);
							$dragger.css("top", $dragger.position().top-(delta*vel));
							Scroll();
							if($dragger.position().top<0){
								$dragger.css("top", 0);
								$customScrollBox_container.stop();
								Scroll();
							}
							if($dragger.position().top>$dragger_container.height()-$dragger.height()){
								$dragger.css("top", $dragger_container.height()-$dragger.height());
								$customScrollBox_container.stop();
								Scroll();
							}
							return false;
						});
					}
				});

				//scroll buttons
				if(scrollBtnsSupport=="yes"){
					$scrollDownBtn.mouseup(function(){
						BtnsScrollStop();
					}).mousedown(function(){
						BtnsScroll("down");
					}).mouseout(function(){
						BtnsScrollStop();
					});
				
					$scrollUpBtn.mouseup(function(){
						BtnsScrollStop();
					}).mousedown(function(){
						BtnsScroll("up");
					}).mouseout(function(){
						BtnsScrollStop();
					});
				
					$scrollDownBtn.click(function(e) {
						e.preventDefault();
					});
					$scrollUpBtn.click(function(e) {
						e.preventDefault();
					});
				
					btnsScrollTimer=0;
				
					function BtnsScroll(dir){
						if(dir=="down"){
							var btnsScrollTo=$dragger_container.height()-$dragger.height();
							var scrollSpeed=Math.abs($dragger.position().top-btnsScrollTo)*(100/scrollBtnsSpeed);
							$dragger.stop().animate({top: btnsScrollTo}, scrollSpeed,"linear");
						} else {
							var btnsScrollTo=0;
							var scrollSpeed=Math.abs($dragger.position().top-btnsScrollTo)*(100/scrollBtnsSpeed);
							$dragger.stop().animate({top: -btnsScrollTo}, scrollSpeed,"linear");
						}
						clearInterval(btnsScrollTimer);
						btnsScrollTimer = setInterval( Scroll, 20);
					}
				
					function BtnsScrollStop(){
						clearInterval(btnsScrollTimer);
						$dragger.stop();
					}
				}
				
				//scroll
				if(bottomSpace<1){
					bottomSpace=1; //minimum bottomSpace value is 1
				}
				var scrollAmount=(totalContent-(visibleHeight/bottomSpace))/(draggerContainerHeight-draggerHeight);
				function Scroll(){
					var draggerY=$dragger.position().top;
					var targY=-draggerY*scrollAmount;
					var thePos=$customScrollBox_container.position().top-targY;
					$customScrollBox_container.stop().animate({top: "-="+thePos}, animSpeed, easeType);
				}
			} else { //disable scrollbar if content is short
				$dragger.css("top",0).css("display","none"); //reset content scroll
				$customScrollBox_container.css("top",0);
				$dragger_container.css("display","none");
				$scrollDownBtn.css("display","none");
				$scrollUpBtn.css("display","none");
			}
//		}
		
		$dragger.mouseup(function(){
			DraggerRelease();
		}).mousedown(function(){
			DraggerPress();
		});

		function DraggerPress(){
			$dragger.addClass("dragger_pressed");
		}

		function DraggerRelease(){
			$dragger.removeClass("dragger_pressed");
		}
	}
	
	$(window).resize(function() {
/*		if(scrollType=="horizontal"){
			if($dragger.position().left>$dragger_container.width()-$dragger.width()){
				$dragger.css("left", $dragger_container.width()-$dragger.width());
			}
		} else {
*/			if($dragger.position().top>$dragger_container.height()-$dragger.height()){
				$dragger.css("top", $dragger_container.height()-$dragger.height());
			}
//		}
		CustomScroller("resize");
	});
};  
})(jQuery);

/* jquery.mCustomScrollbar.js ends here */

/* Copyright (c) 2009 Brandon Aaron (http://brandonaaron.net)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 *
 * Version: 3.0.2
 * 
 * Requires: 1.2.2+
 */
(function(c){var a=["DOMMouseScroll","mousewheel"];c.event.special.mousewheel={setup:function(){if(this.addEventListener){for(var d=a.length;d;){this.addEventListener(a[--d],b,false)}}else{this.onmousewheel=b}},teardown:function(){if(this.removeEventListener){for(var d=a.length;d;){this.removeEventListener(a[--d],b,false)}}else{this.onmousewheel=null}}};c.fn.extend({mousewheel:function(d){return d?this.bind("mousewheel",d):this.trigger("mousewheel")},unmousewheel:function(d){return this.unbind("mousewheel",d)}});function b(f){var d=[].slice.call(arguments,1),g=0,e=true;f=c.event.fix(f||window.event);f.type="mousewheel";if(f.wheelDelta){g=f.wheelDelta/120}if(f.detail){g=-f.detail/3}d.unshift(f,g);return c.event.handle.apply(this,d)}})(jQuery);

/* jquery.mousewheel.min.js ends here */

/*
 * jQuery history plugin
 * 
 * The MIT License
 * 
 * Copyright (c) 2006-2009 Taku Sano (Mikage Sawatari)
 * Copyright (c) 2010 Takayuki Miwa
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

(function($) {
    var locationWrapper = {
        put: function(hash, win) {
            (win || window).location.hash = this.encoder(hash);
        },
        get: function(win) {
            var hash = ((win || window).location.hash).replace(/^#/, '');
            try {
                return $.browser.mozilla ? hash : decodeURIComponent(hash);
            }
            catch (error) {
                return hash;
            }
        },
        encoder: encodeURIComponent
    };

    var iframeWrapper = {
        id: "__jQuery_history",
        init: function() {
            var html = '<iframe id="'+ this.id +'" style="display:none" src="javascript:false;" />';
            $("body").prepend(html);
            return this;
        },
        _document: function() {
            return $("#"+ this.id)[0].contentWindow.document;
        },
        put: function(hash) {
            var doc = this._document();
            doc.open();
            doc.close();
            locationWrapper.put(hash, doc);
        },
        get: function() {
            return locationWrapper.get(this._document());
        }
    };

    function initObjects(options) {
        options = $.extend({
                unescape: false
            }, options || {});

        locationWrapper.encoder = encoder(options.unescape);

        function encoder(unescape_) {
            if(unescape_ === true) {
                return function(hash){ return hash; };
            }
            if(typeof unescape_ == "string" &&
               (unescape_ = partialDecoder(unescape_.split("")))
               || typeof unescape_ == "function") {
                return function(hash) { return unescape_(encodeURIComponent(hash)); };
            }
            return encodeURIComponent;
        }

        function partialDecoder(chars) {
            var re = new RegExp($.map(chars, encodeURIComponent).join("|"), "ig");
            return function(enc) { return enc.replace(re, decodeURIComponent); };
        }
    }

    var implementations = {};

    implementations.base = {
        callback: undefined,
        type: undefined,

        check: function() {},
        load:  function(hash) {},
        init:  function(callback, options) {
            initObjects(options);
            self.callback = callback;
            self._options = options;
            self._init();
        },

        _init: function() {},
        _options: {}
    };

    implementations.timer = {
        _appState: undefined,
        _init: function() {
            var current_hash = locationWrapper.get();
            self._appState = current_hash;
            self.callback(current_hash);
            setInterval(self.check, 100);
        },
        check: function() {
            var current_hash = locationWrapper.get();
            if(current_hash != self._appState) {
                self._appState = current_hash;
                self.callback(current_hash);
            }
        },
        load: function(hash) {
            if(hash != self._appState) {
                locationWrapper.put(hash);
                self._appState = hash;
                self.callback(hash);
            }
        }
    };

    implementations.iframeTimer = {
        _appState: undefined,
        _init: function() {
            var current_hash = locationWrapper.get();
            self._appState = current_hash;
            iframeWrapper.init().put(current_hash);
            self.callback(current_hash);
            setInterval(self.check, 100);
        },
        check: function() {
            var iframe_hash = iframeWrapper.get(),
                location_hash = locationWrapper.get();

            if (location_hash != iframe_hash) {
                if (location_hash == self._appState) {    // user used Back or Forward button
                    self._appState = iframe_hash;
                    locationWrapper.put(iframe_hash);
                    self.callback(iframe_hash); 
                } else {                              // user loaded new bookmark
                    self._appState = location_hash;  
                    iframeWrapper.put(location_hash);
                    self.callback(location_hash);
                }
            }
        },
        load: function(hash) {
            if(hash != self._appState) {
                locationWrapper.put(hash);
                iframeWrapper.put(hash);
                self._appState = hash;
                self.callback(hash);
            }
        }
    };

    implementations.hashchangeEvent = {
        _init: function() {
            self.callback(locationWrapper.get());
            $(window).bind('hashchange', self.check);
        },
        check: function() {
            self.callback(locationWrapper.get());
        },
        load: function(hash) {
            locationWrapper.put(hash);
        }
    };

    var self = $.extend({}, implementations.base);

    if($.browser.msie && ($.browser.version < 8 || document.documentMode < 8)) {
        self.type = 'iframeTimer';
    } else if("onhashchange" in window) {
        self.type = 'hashchangeEvent';
    } else {
        self.type = 'timer';
    }

    $.extend(self, implementations[self.type]);
    $.history = self;
})(jQuery);

/* jquery.history.js ends here */

/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built In easIng capabilities added In jQuery 1.1
 * to offer multiple easIng options
 *
 * Copyright (c) 2007 George Smith
 * Licensed under the MIT License:
 *   http://www.opensource.org/licenses/mit-license.php
 */

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	}
});

/* jquery.easing.js ends here */
