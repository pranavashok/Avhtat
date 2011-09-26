<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>	
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="cache-control" content="public" />
		<meta http-equiv="content-language" content="en-IN" />
		<meta http-equiv="expires" content="Mon, 31 Aug 2012 00:00:00 GMT" />
		<link rel="icon" type="image/png" href="styles/images/favicon.png" />
		<link href='styles/wrapper.css' type='text/css' rel='stylesheet' />
		<link href='styles/lavalamp.css' type='text/css' rel='stylesheet' />
		<link href='styles/li-scroller.css' type='text/css' rel='stylesheet' />
		<link href='styles/tipsy.css' type='text/css' rel='stylesheet' />		<!--for sidebar tooltip-->		
		<link href="styles/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
 		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<!-- 		<script type="text/javascript" src="js/jquery.min.js"></script>
 		<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>-->
 		<!--<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>-->
 		<script type="text/javascript" src="js/externalscripts.js"></script>
  		<script type="text/javascript" src="js/jquery.li-scroller.1.0.js"></script>
    		<!--<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>-->
<!--		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>-->
<!--		<script type="text/javascript" src="js/jquery.lavalamp.1.2.js"></script>
		<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>		
-->		<script type="text/javascript" src="js/script.js"></script>
		<!--<script type="text/javascript" src="js/jquery.tipsy.js"></script>
-->
		<script type="text/javascript">	
		//setTimeout('ipac.contentWindow.focus()',5000);
	        $(document).ready(function () {
			var _escaped_fragment_ = document.location.search;
			if(!_escaped_fragment_) $("#innerpage").hide();
 			$('.sbicon').tipsy({gravity: 's'});
                        $.history.init(pageload);
	                //$('a[href=' + window.location.hash + ']').addClass('selected');
		        $('a[rel=ajax]').click(function () {
				var hash = this.href;
			        hash = hash.replace(/^.*#/, '');
	 		        $.history.load(hash);	
	 		        $('a[rel=ajax]').removeClass('selected');
	 		        $(this).addClass('selected');
	 		        //$('#innerpage').hide();
	 		        //$('#frontpage').hide();
	 		        $('#gallery-cont').hide();
	 		        $('#bglogo').show();
	 		        $("#oe_overlay").show();
	 		        getPage();
			        return false;
	        	});	
	        	$("ul#ticker01").liScroll({travelocity: 0.06});
	        	$("#loading").hide();
		});
		
		function pageload(hash) {
			if (hash == '!gallery') {
				$('#frontpage').hide();	
				$('#innerpage').hide();
				$('#gallery-cont').fadeIn('slow');
				$('#loading').hide();
			}
			else if (hash.substr(0,7) == '!verify')	loadVerify(hash.substr(8));
			else if (hash) getPage();    
		}
		
		function getPage() {
			var data = 'page=' + encodeURIComponent(document.location.hash.substring(2));
			$('#suggestions').hide();
			$('#frontpage').hide();	
			$('#innerpage').fadeIn('slow');
			$("#loading").show();
			$("#oe_overlay").show();
 		        $('#gallery-cont').hide();
			$.ajax({
				url: "loader.php",	
				type: "GET",		
				data: data,		
				cache: false,
				success: function (html) {	
					$('#bglogo').show();			
					$('#content').html(html);				
					bindLinks();
					$("#loading").hide();
					$("#oe_overlay").hide();
//					$(this).hide("slide", { direction: "down" }, 1000);
					$("#initiatives").hide('slow', function(){
						$('#footerlinks').animate({left:(($(document).width()/2)-470) + 'px'},500,function(){
							$('html, body').stop(true, true).animate({
								scrollTop: 0,
								queue: false
							}, 500, 'easeOutSine');
						});	
					});
				}
			});
		}
		function search() {
			document.location.hash='!q='+$('#q').attr('value').replace(' ','|');
			getPage();
		}
		</script>
		<title>
			Tathva '11 | National Institute of Technology, Calicut
		</title>
	</head>
	<body onload='init()'>
	<div id = "wrapper">
  		<div id="oe_overlay" class="oe_overlay"><!--<iframe id='ipac' width=620 height=400 src="pacman.html"></iframe>--></div>
  		<div id = "topbar">   		
    			<a href="index.php">
    			<div class="logo"></div>
    			</a>
    			<div class = "oe_wrapper">
    				<ul id="oe_menu" class="oe_menu"> 
    					<li><a href="#">Events</a>
    						<div style="width:640px;">    				
						      <ul>
							  <li class="oe_heading">Robotics</li>
							  <li><a href="#!transporter" rel="ajax">Transporter</a></li>
							  <li><a href="#!leagueofmachines" rel="ajax">League of Machines</a></li>
							  <li><a href="#!minimousev2" rel="ajax">Minimouse v2</a></li>
							  <li><a href="#!signalmaestro" rel="ajax">Signal Maestro</a></li>
							  <li><a href="#!collisioncourse" rel="ajax">Collision Course</a></li>
							  <li><a href="#!dirtrace" rel="ajax">Dirt Race</a></li>              
						      </ul>
						      <ul>
							  <li class="oe_heading" >Mechanical</li>
							  <li><a href="#!contraption" rel="ajax">Contraption</a></li>
							  <li><a href="#!incarnate" rel="ajax">Incarnate</a></li>
							  <li><a href="#!theoffroadmi" rel="ajax">The Off Road MI</a></li>
							  <li><a href="#!amphiboat" rel="ajax">AMPHI-BOaT</a></li>
							  <li><a href="#!aquamissile" rel="ajax">Aqua Missile</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">General</li>
							  <li><a href="#!blueprint" rel="ajax">Blueprint</a></li>
							  <li><a href="#!losttreasureoftechila" rel="ajax">Lost Treasure of Techila</a></li>
  							  <li><a href="#!bizbioperzanta" rel="ajax">Bizbio Perzanta</a></li>
							  <li><a href="#!inquisitovirtuoso" rel="ajax">Inquisito Virtuoso</a></li>
							  <li><a href="#!tathvaquiz" rel="ajax">Tathva Quiz '11</a></li>
							  <li><a href="#!tots" rel="ajax">TOTS</a></li>							  
						      </ul>
						      <ul>
							  <li class="oe_heading" >Blitzkrieg</li>
							  <li><a href="#!dota" rel="ajax">DotA</a></li>
							  <li><a href="#!counterstrike" rel="ajax">Counter-Strike 1.6</a></li>
							  <li><a href="#!streetfighter" rel="ajax">Super Street Fighter 4</a></li>
							  <li><a href="#!nfsmw" rel="ajax">NFS: Most Wanted</a></li>							
							  <li><a href="#!fifa11" rel="ajax">FIFA 11</a></li>
							  <li><a href="#!ragdollmasters" rel="ajax">Ragdoll Masters</a></li>  							      </ul>						      
						      <ul style="clear:both;">
							  <li class="oe_heading">Electrical</li>
							  <li><a href="#!mousedrive" rel="ajax">Mouse Drive</a></li>
							  <li><a href="#!coilgun" rel="ajax">Coil Gun</a></li>
							  <li><a href="#!puretrics" rel="ajax">Pure Trics</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading" >Electronics</li>
							  <li><a href="#!3gsm" rel="ajax">3GSM</a></li>
							  <li><a href="#!sonici" rel="ajax">Sonic i</a></li>
							  <li><a href="#!eracer" rel="ajax">E Racer</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">Civil</li>
							  <li><a href="#!erecthion" rel="ajax">eRECthion</a></li>
							  <li><a href="#!ageoffloatingempires" rel="ajax">Age of Floating Empires</a></li>
							  <li><a href="#!descartessquare" rel="ajax">Descartes Square</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">Computer Science</li>
							  <li><a href="#!befunge" rel="ajax">Befunge</a></li>
							  <li><a href="#!koderkombat" rel="ajax">Koderkombat</a></li>
							  <li><a href="#!tuxofwar" rel="ajax">Tux of War</a></li>               
						      </ul>
						      <ul style="clear:both;">
					                  <li class="oe_heading">Architecture</li>
					                  <li><a href="#!pathtofame" rel="ajax">Path to Fame</a></li>
					                  <li><a href="#!poddesign" rel="ajax">Pod Design</a></li>
					                  <li><a href="#!colourpalette" rel="ajax">Colour Palette</a></li>
					                  <li><a href="#!kineticsculpture" rel="ajax">Kinetic Sculpture</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">Management</li>
							  <li><a href="#!b-aptist" rel="ajax">B-Aptist</a></li>
							  <li><a href="#!tycoon" rel="ajax">Tycoon</a></li>
						          <li><a href="#!bplan" rel="ajax">Sociobizz '11</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading" >Chemical</li>
							  <li><a href="#!cheautic" rel="ajax">Che Autic</a></li>
							  <li><a href="#!interrepteur" rel="ajax">Interrupteur</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">Online</li>
							  <li><a href="#!bullsnbears" rel="ajax">Bulls n Bears</a></li>
							  <li><a href="http://clueless.tathva.org" target="_blank">Clueless</a></li>
							  <li><a href="#!onlinequiz" rel="ajax">Online Quiz</a></li>
						      </ul>
    						</div>
    					</li>
    					<li><a href="#">Workshops</a>
    				  		<div style="width:320px;">
		    					<ul>
		    				      		<li class="oe_heading">General</li>
		    				      		<li><a href="#!astrophotography">Astro Photography</a></li>
		    				    	</ul>
		    				    	<ul>
			    				      	<li class="oe_heading">Technical</li>
			    				      	<li><a href="#!rcplane">RC Plane</a></li>
			    				      	<li><a href="#!hackattack">Hack Attack</a></li>
			    				      	<li><a href="#!cloudcomputing">Cloud Computing</a></li> 
			    				      	<li><a href="#!accelerobotix">Accelero-Botix</a></li> 
			    				      	<li><a href="#!automotiveandengine">Automotive & Engine Design</a></li>			    				      	
			    				</ul>
    				  		</div>
    					</li>
    					<li><a href="#">Exhibitions</a>
						<div style="width:320px;">
		    					<ul>
		    				      		<li class="oe_heading">Government</li>
		    				      		<li><a href="#!indianarmy">Indian Army</a></li>
		    				      		<li><a href="#!npol">NPOL</a></li>
		    				      		<li><a href="#!isro">ISRO</a></li>
		    				    	</ul>
		    				    	<ul>
			    				      	<li class="oe_heading">Tech Symposium</li>
		    				      		<li><a href="#!touchmagix">Touch Magix</a></li>		    				     
								<li><a href="#!hamradio">Ham Radio</a></li>
		    				      		<li><a href="#!interface">IEEE Interface '11</a></li>		    				     		    				      	
			    				</ul>
    				  		</div>
    					
    					
    					</li>
					<li><a href="#">Highlights</a>
						<div style="width:320px;">
    				    			<ul>
    				    				<li class="oe_heading">Lectures</li>
    				      				<li><a href="#!drtessythomas">Dr. Tessy Thomas</a></li>
    				      				<li><a href="#!rajunarayanaswamy">Raju Narayana Swamy</a></li>
    				    			</ul>
    				    			<ul>
    				    				<li class="oe_heading">Envision</li>
    				      				<li><a href="#!idp">Industry Defined Problems</a></li>
    				    			</ul>
    				  		</div>
    				  		
					</li>
					<!-- <li><a href="#">Initiatives</a>
						<div style="width:160px;">
    				    			<ul>
		    				      		<li class="oe_heading">Social Initiatives</li>
		    				      		<li><a href="#!teachforindia">Teach for India</a></li>
		    				      		<li><a href="#!supportmyschool">NDTV-Coke <br />Support My School</a></li>
		    				      		<li><a href="#!youngengineer">Young Engineer</a></li>
		    				    	</ul>
		    				    	<ul>
			    				      	<li class="oe_heading">Campus Initiatives</li>
    				      				<li><a href="#!campusmapping">Campus Mapping</a></li>
    				      				<li><a href="#!greencampus">Green Campus</a></li>
			    				</ul>
    				  		</div>
    				  		
					</li>-->
     				</ul> <!-- oe_menu ???-->
    			</div>  
    			<div id = "searchcontainer">
    				<form id="searchform" action="" method="">
      					<div class="searchboxwrapper">
      		  				<input id="q" class="searchbox" onkeyup="lookup(this.value);" name="q" type="text" value="tathva instant" autocomplete="off"/> 	
      		  				<img id="s-loader" src="styles/images/s-loader.gif"></img>
      					</div>
      					<!--<input id="searchbutton" type="submit" />-->
      					<div id="suggestions">
						
					</div>
    				</form>
    			</div>
    			<div id = "loginlinkscontainer">
	    			<ul id="loginlinks">
	    				<li><a href="#!register" rel="ajax">Register</a></li>				
	    			</ul>
    			</div>	
  		</div>  		  		
  		<div id = "sidebar">
	  		<ul>
		  		<li><a href="#!info" rel="ajax"><img class ="sbicon" title="Information" src="styles/images/sbinfo.png"/></a></li>
		  		<li><a href="#!schedule" rel="ajax"><img class ="sbicon" title="Schedule" src="styles/images/sbschedule.png"/></a></li>
		  		<li><a href="#!gallery"><img class ="sbicon" title="Gallery" src="styles/images/sbgallery.png"/></a></li>
		  		<li><a href="#!sponsors" rel="ajax"><img class ="sbicon" title="Sponsorship" src="styles/images/sbsponsorship.png"/></a></li>
		  		<li><a href="#!feedback" rel="ajax"><img class ="sbicon" title="Feedback" src="styles/images/sbfeedback.png"/></a></li>
	  		</ul>
	  		<div id="sidebar-puller">
	  		</div>
  		</div>

  		<div id = "frontpage">
	  		<div id = "headerlogo">
	  		</div>
			<div id="sponsor">
			<div id="sponsslider"> 
 	 <ul> 
 	  <li><img src="styles/images/sponsors/gasotech.jpg" alt=""/></li>
 	  <li><img src="styles/images/sponsors/teachforindia.jpg" alt=""/></li>
 	  <li><img src="styles/images/sponsors/arbitron.jpg" alt=""/></li>
   	  <li><img src="styles/images/sponsors/transition.jpg" alt=""/></li>
 	  <li><img src="styles/images/sponsors/raritan.jpg" alt=""/></li>
 	  <!--<li><img src="styles/images/sponsors/cocacola.jpg" alt=""/></li>-->
 	  <li><img src="styles/images/sponsors/greenadd.jpg" alt=""/></li> 	  
 	  <li><img src="styles/images/sponsors/supportmyschool.jpg" alt=""/></li>
 <!--	  <li><img src="styles/images/sponsors/touchmagix.jpg" alt=""/></li>-->
 	  <li><img src="styles/images/sponsors/treksnrapids.jpg" alt=""/></li>
   	  <li><img src="styles/images/sponsors/aerotrix.jpg" alt=""/></li>
   	  <li><img src="styles/images/sponsors/aruba.jpg" alt=""/></li>
     	  <li><img src="styles/images/sponsors/nsef.jpg" alt=""/></li>
     	  <li><img src="styles/images/sponsors/cyberpark.jpg" alt=""/></li>
 	 </ul> 
 	 </div> 
		</div>
		<?php if(!isset($_GET['_escaped_fragment_'])): ?>
		 <div id="slider">
		   <ul id="panels">
		   <li id='panel0'>
		   <div class="text-content">
		   	<h2> <a href="#!rcplane">Airshow</a> </h2><br/>
			<p>
				Always been mesmerized by aircrafts and aviation? Then this is the chance for you to see and learn
it from the professionals. A series of workshops that is sure to take you on a magical journey into the
world of aerodynamics. Experience this life of zero gravity only at Tathva ’11.
			</p>
		   </div>
		   <a href="#!rcplane">
			<img src="styles/images/airshow.jpg" alt="1"/>
		   </a>
		   </li>
		   <li id='panel1'>
		   <div class="text-content">
		   	<h2> <a href="#!cloudcomputing">Cloud Computing Workshop</a> </h2><br/>
			<p>
				Bringing to the masses a service that has taken the virtual world by storm. Tathva ’11 offers you this
unique opportunity of mastering this technique of sharing information and learning the intricacies
behind it.
			</p>
		   </div>
		   <a href="#!cloudcomputing">
			<img src="styles/images/cloud.jpg" alt="2"/>
		   </a>
		   </li>
		   <li id='panel2'>
		 	<div class="text-content">
		   	<h2> <a href="#!aquamissile">Aqua Missile</a> </h2><br/>
			<p>
				A challenging event that tests your designing skills. Blend two of the ancient elements of nature,
water and air, to create one of the most modern innovations of mankind.
			</p>
		   	</div>
		   	<a href="#!aquamissile">
				<img src="styles/images/waterrocket.jpg" alt="3"/>
		   	</a>
		   </li>
		   <li id='panel3'>
		 	<div class="text-content">
		   	<h2> <a href="#!dirtrace">Dirt Race</a> </h2><br/>
			<p>
				The race to the finish-line can never get more interesting than this. Let your bots do all the talking
while you sit back and enjoy the game. Be crowned the champion in this all new exciting Robot-war!
			</p>
		   	</div>
		   	<a href="#!dirtrace">
				<img src="styles/images/dirtrace.jpg" alt="4"/>
		   	</a>
		   </li>
		   <li id='panel4'>
		 	<div class="text-content">
		   	<h2> <a href="#!bplan">B - Plan</a> </h2><br/>
			<p>
				If you have ever dreamt of making it big in the Biz-world, then this is the event for you. Chalk out
your dream business venture and earn a place in our coveted Hall of Fame!
			</p>
		   	</div>
		   	<a href="#!bplan">
				<img src="styles/images/bplan.jpg" alt="5"/>
		   	</a>
		   </li>
		   <li id='panel5'>
		 	<div class="text-content">
		   	<h2> <a href="#!touchmagix">Touch Magix</a> </h2><br/>
			<p>
				Be enthralled by a creative mix of displays as you get engulfed in this fascinating show that will leave
you asking for more. Enjoy a whole new experience like never before only at Tathva ’11.
			</p>
		   	</div>
		   	<a href="#!touchmagix">
				<img src="styles/images/touchmagix.jpg" alt="6"/>
		   	</a>
		   </li>
		   </ul>
		   <div id="nav-icons">
			<ul class='lavaLamp'>
				<li id='0'><a href="#"><img src="styles/images/buttons/airshow.jpg"/></a></li>
				<li id='1'><a href="#"><img src="styles/images/buttons/cloud.jpg"/></a></li>
				<li id='2'><a href="#"><img src="styles/images/buttons/waterrocket.jpg"/></a></li>
				<li id='3'><a href="#"><img src="styles/images/buttons/dirtrace.jpg"/></a></li>
				<li id='4'><a href="#"><img src="styles/images/buttons/bplan.jpg"/></a></li>
				<li id='5'><a href="#"><img src="styles/images/buttons/touchmagix.jpg"/></a></li>
			</ul>	
		   </div>
		   </div>
        			
		 </div>
			   <?php endif; ?>
  		
  		<div id="innerpage">
  		                <div id="content">
	                  		<?php if(isset($_GET['_escaped_fragment_'])) echo file_get_contents('http://localhost/Tathva--11-Website/loader.php?page='.$_GET['_escaped_fragment_']); ?>
  		                	<!-- Ajax Content -->
                                </div>

                </div> 
                <div id="gallery-cont">
                <iframe width="960px" height="520px" src="gallery.php"></iframe>
                </div>
  		<div id = "updatebar">
  		  <div id = "updates"> 
  		  	<!--<div id="fadeleft"></div>-->
			<div class="ticketcontainer">
			    <ul id="ticker01">
				<li><span><a href="http://clueless.tathva.org/" target="_blank">Clueless</a>, the cryptic online treasure hunt has started </span></li>
				<li><span>| Trial run of <a href="http://bullsnbears.tathva.org/" target="_blank">Bulls n Bears</a>, the equity trading game, has begun. The official launch will be on Thursday. </span></li>
			    </ul>
			</div>
			<!--<div id="faderight"></div>-->
		  </div>
  		  <div id = "contactsbutton">INITIATIVES | CONTACTS | MORE</div>
  		  <div id = "social">
  		    <div id="gplus"><g:plusone size="medium" count="false"></g:plusone></div>
  		    <a href="#"><img src="styles/images/twitter.png"></img></a>
  		    <a href="http://www.facebook.com/pages/Tathva-11/188427287863834"><img src="styles/images/facebook.png"></img></a>
  		  </div>  		
  		</div>
  		<div id="footer">
  		<div id="footercontainer">
  		<div id="footerlinks">
  		<ul>
  		<li id="initiate">Initiatives</li>
  		<li> <a href="#!reachus" rel="ajax">Reach Us </a></li>
  		<li> <a href="#!downloads" rel="ajax">Downloads</a></li>
  		<li><a href="#"> Forum</a> </li>
  		<li><a href="#!credits" rel="ajax"> Credits</a> </li>
  		</ul>
  		</div>
  		<div id="initiatives">
  		<ul>
			<li><a href="#!teachforindia">Teach for India</a></li>
		   	<li><a href="#!supportmyschool">NDTV-Coke <br/>Support My School</a></li>
		    	<li><a href="#!youngengineer">Young Engineer</a></li>
		    	<li><a href="#!campusinitiatives">Campus Initiatives</a></li>
  		</ul>
  		</div>
  		
  		<div id="contacts">
  		<table>
  		<tr>
  			<th>Technical Affairs Secretary</th><th>Student Coordinator</th><th>Marketing Managers</th>
  		</tr>
  		<tr>
  			<td><strong>Rojith Jones</strong><br /><span class="contact-details">rojith@tathva.org<br />+91-9497308105</span></td>
  			<td><strong>Marilyn George</strong><br /><span class="contact-details">marilyn@tathva.org<br />+91-9497778936</span></td>
  			<td><strong>Nitheesh K Pai</strong><br /><span class="contact-details">nitheeshkpai@tathva.org<br />+91-9895689519</span></td>
  		</tr>
  		<tr>
  			<td></td><td></td><td><strong>Rashid CMP</strong><br /><span class="contact-details">rashidcmp@tathva.org<br />+91-9746749787</span></td>
  		</tr>
  		</table>
  	
  		</div>
  		<div id="nitc"><p><a href="http://nitc.ac.in" target="_blank"><img  src="styles/images/nitc.png" /></a>		
  		NIT Calicut
  		<br/>
  		NIT Campus P. O.
  		<br/>
  		Calicut - 673601
  		<br/>
  		<a href="http://nitc.ac.in" target="_blank">
  		http://nitc.ac.in
  		</a>
  		</p>
  		<br>...........................................................<br/>
  		<span> Best viewed in latest versions of <a href="http://google.com/chrome" target="_blank">Google Chrome</a> and <a href="http://www.mozilla.com/en-US/firefox/new/" target="_blank">Mozilla Firefox</a> </span>
  		</div>
  		</div>
  		</div>
  	</div>
  	</div>
  	<div id="loading"><img src="styles/images/loading.gif"/></div>
	</body>	
</html>
