<html>
	<head>
		<link rel="icon" type="image/png" href="styles/images/favicon.png" />
		<link href = 'styles/wrapper.css' type='text/css' rel='stylesheet' />
		<link href = 'styles/lavalamp.css' type='text/css' rel='stylesheet' />
		<link href = 'styles/tipsy.css' type='text/css' rel='stylesheet' />		<!--for sidebar tooltip-->
		
		
		<link href="styles/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
		<link href="styles/coin-slider-styles.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!-- 		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->
    		<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>
<!--		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>-->
		<script type="text/javascript" src="js/jquery.history.js"></script>
		<script type="text/javascript" src="js/jquery.lavalamp.1.2.js"></script>
		<script  type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>		
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/jquery.tipsy.js"></script>
		<script type="text/javascript">	
	        $(document).ready(function () {
			var _escaped_fragment_ = document.location.search;
			if(!_escaped_fragment_) $("#innerpage").hide();
 			$('.sbicon').tipsy({gravity: 's'});
                        $.history.init(pageload);	
	                $('a[href=' + window.location.hash + ']').addClass('selected');
		        $('a[rel=ajax]').click(function () {
				var hash = this.href;
			        hash = hash.replace(/^.*#/, '');
	 		        $.history.load(hash);	
	 		        $('a[rel=ajax]').removeClass('selected');
	 		        $(this).addClass('selected');
	 		        $('#innerpage').hide();
	 		        $('#frontpage').hide();
	 		        $('#bglogo').show();
	 		        getPage();
			        return false;
	        	});	
		});
	
		function pageload(hash) {
			if (hash) getPage();    
		}
		
		function getPage() {
			var data = 'page=' + encodeURIComponent(document.location.hash.substring(2));
			$.ajax({
				url: "loader.php",	
				type: "GET",		
				data: data,		
				cache: false,
				success: function (html) {	
					$('#frontpage').hide();	
					$('#bglogo').show();			
					$('#content').html(html);
					$('#innerpage').fadeIn('slow');		
					bindLinks();
		
				}		
			});
		}
		</script> 
		<title>
			Tathva '11 | National Institute of Technology, Calicut
		</title>
	</head>
	<body>
	<div id = "wrapper">
  		<div id="oe_overlay" class="oe_overlay"></div>
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
							  <li><a href="#!transpoter" rel="ajax">Transporter</a></li>
							  <li><a href="#!leagueofmachines" rel="ajax">League of Machines</a></li>
							  <li><a href="#!miniaturemouse" rel="ajax">Miniature Mouse</a></li>
							  <li><a href="#!signalmaestro" rel="ajax">Signal Maestro</a></li>
							  <li><a href="#!robowars" rel="ajax">Robo Wars</a></li>
							  <li><a href="#!dirtrace" rel="ajax">Dirt Race</a></li>              
						      </ul>
						      <ul>
							  <li class="oe_heading" >Mechanical</li>
							  <li><a href="#!cadquest" rel="ajax">Contraption</a></li>
							  <li><a href="#!incarnate" rel="ajax">Incarnate</a></li>
							  <li><a href="#!theoffroadmi" rel="ajax">The Off Road MI</a></li>
							  <li><a href="#!amphiboat" rel="ajax">Amphiboat</a></li>
							  <li><a href="#!waterrocket" rel="ajax">Water Rocket</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">General</li>
							  <li><a href="#!blueprint" rel="ajax">Blueprint</a></li>
							  <li><a href="#!blitzkreig" rel="ajax">Blitzkreig</a></li>
							  <li><a href="#!losttreasureoftechila" rel="ajax">Lost Treasure of Techila</a></li>
							  <li><a href="#!idp" rel="ajax">Industry Defined Problems</a></li>
						      </ul>
						      <ul>
					                  <li class="oe_heading">Architecture</li>
					                  <li><a href="#!pathtofame" rel="ajax">Path to Fame</a></li>
					                  <li><a href="#!poddesign" rel="ajax">Pod Design</a></li>
					                  <li><a href="#!colourpalette" rel="ajax">Colour Palette</a></li>
					                  <li><a href="#!kineticsculpture" rel="ajax">Kinetic Sculpture</a></li>
						      </ul>
						      <ul style="clear:both;">
							  <li class="oe_heading">Electrical</li>
							  <li><a href="#!mousedrive" rel="ajax">Mouse Drive</a></li>
							  <li><a href="#!coilgun" rel="ajax">Coil Gun</a></li>
							  <li><a href="#!puretricks" rel="ajax">Pure Tricks</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading" >Electronics</li>
							  <li><a href="#!gsm" rel="ajax">GSM</a></li>
							  <li><a href="#!sonici" rel="ajax">Sonic i</a></li>
							  <li><a href="#!eracer" rel="ajax">E Racer</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">Civil</li>
							  <li><a href="#!erecthion" rel="ajax">eRECthion</a></li>
							  <li><a href="#!ageoffloatingempire" rel="ajax">Age of Floating Empire</a></li>
							  <li><a href="#!descartessquare" rel="ajax">Descartes Square</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">Computer Science</li>
							  <li><a href="#!befunge" rel="ajax">Befunge</a></li>
							  <li><a href="#!koderkombat" rel="ajax">Koderkombat</a></li>
							  <li><a href="#!tuxofwar" rel="ajax">Tux of War</a></li>               
						      </ul>
						      <ul>
							  <li class="oe_heading">Online</li>
							  <li><a href="#!bullsnbears" rel="ajax">Bulls n Bears</a></li>
							  <li><a href="#!clueless" rel="ajax">Clueless</a></li>
							  <li><a href="#!onlinequiz" rel="ajax">Online Quiz</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">Management</li>
							  <li><a href="#!b-aptist" rel="ajax">B-Aptist</a></li>
							  <li><a href="#!tycoon" rel="ajax">Tycoon</a></li>
						          <li><a href="#!bplan" rel="ajax">B-Plan</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading" >Chemical</li>
							  <li><a href="#!cheautic" rel="ajax">Che Autic</a></li>
							  <li><a href="#!interrepteur" rel="ajax">Interrupteur</a></li>
						      </ul>
						      <ul>
							  <li class="oe_heading">Biotechnology</li>
							  <li><a href="#!bizbioperzanta" rel="ajax">Bizbio Perzanta</a></li>
							  <li><a href="#!inquisitovirtuoso" rel="ajax">Inquisito Virtuoso</a></li>
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
			    				      	<li><a href="#!humanoidrobot">Bipedal Humanoid</a></li> 
			    				</ul>
    				  		</div>
    					</li>
    					<li><a href="#">Exhibitions</a></li>
    					<li><a href="#">Lectures</a>
						<div style="width:160px;">
    				    			<ul>
    				      				<li><a href="#!drtessythomas">Dr. Tessy Thomas</a></li>
    				      				<li><a href="#!rajunarayanaswamy">Raju Narayana Swamy</a></li>
    				    			</ul>
    				  		</div>
					</li>
     				</ul> <!-- oe_menu ???-->
    			</div>  
    			<div id = "searchcontainer">
    				<form id="searchform" action="search.php" method="get">
      					<div class="searchboxwrapper">
      		  				<input class="searchbox" name="q" type="text" autocomplete="off"/> 
      					</div>
      					<input id="searchbutton" type="submit" />
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
		  		<li><a href="#!gallery" rel="ajax"><img class ="sbicon" title="Gallery" src="styles/images/sbgallery.png"/></a></li>
		  		<li><a href="#!sponsors" rel="ajax"><img class ="sbicon" title="Sponsorship" src="styles/images/sbsponsorship.png"/></a></li>
		  		<li><a href="#!feedback" rel="ajax"><img class ="sbicon" title="Feedback" src="styles/images/sbfeedback.png"/></a></li>
	  		</ul>
  		</div>

  		<div id = "frontpage">
	  		<div id = "headerlogo">
	  		</div>
			<div id="sponsor">
			<div id="sponsslider"> 
 	 <ul> 
 	  <li><img src="styles/images/sponsors/gasotech.jpg" alt=""/></li>
 	  <li><img src="styles/images/sponsors/aruba.jpg" alt=""/></li>
 	  <li><img src="styles/images/sponsors/cocacola.jpg" alt=""/></li>	 
 	  <li><img src="styles/images/sponsors/greenadd.jpg" alt=""/></li> 	  
 	  <li><img src="styles/images/sponsors/supportmyschool.jpg" alt=""/></li>
 	  <li><img src="styles/images/sponsors/touchmagix.jpg" alt=""/></li>
 	  <li><img src="styles/images/sponsors/treksnrapids.jpg" alt=""/></li>
   	  <li><img src="styles/images/sponsors/aerotrix.jpg" alt=""/></li>
 	 </ul> 
 	 </div> 
		</div>
		<?php if(!isset($_GET['_escaped_fragment_'])): ?>
		 <div id="slider">
		   <ul id="panels">
		   <li id='panel0'>
		   <div class="text-content">
		   	<h2> Airshow </h2><br/>
			<p>
				This is a short write-up for airshow workshop.
			</p>
		   </div>
		   <a href="#">
			<img src="styles/images/airshow.jpg" alt="1"/>
		   </a>
		   </li>
		   <li id='panel1'>
		 	<div class="text-content">
		   	<h2> Cloud Computing Workshop </h2><br/>
			<p>
				Cloud computing workshop...
			</p>
		   </div>
		   <a href="#">
			<img src="styles/images/cloud.jpg" alt="2"/>
		   </a>
		   </li>
		   <li id='panel2'>
		 	<div class="text-content">
		   	<h2> Water Rocket </h2><br/>
			<p>
				Water Rocket ...
			</p>
		   	</div>
		   	<a href="#">
				<img src="styles/images/waterrocket.jpg" alt="3"/>
		   	</a>
		   </li>
		   <li id='panel3'>
		 	<div class="text-content">
		   	<h2> Dirt Race </h2><br/>
			<p>
				Dirt Race ...
			</p>
		   	</div>
		   	<a href="#">
				<img src="styles/images/dirtrace.jpg" alt="4"/>
		   	</a>
		   </li>
		   <li id='panel4'>
		 	<div class="text-content">
		   	<h2> B - Plan </h2><br/>
			<p>
				B - Plan ...
			</p>
		   	</div>
		   	<a href="#">
				<img src="styles/images/bplan.jpg" alt="5"/>
		   	</a>
		   </li>
		   <li id='panel5'>
		 	<div class="text-content">
		   	<h2> Touch Magix </h2><br/>
			<p>
				Touch Magix ...
			</p>
		   	</div>
		   	<a href="#">
				<img src="styles/images/touchmagix.jpg" alt="6"/>
		   	</a>
		   </li>
		   </div>
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
			   <?php endif; ?>
  		</div>
  		<div id="innerpage">
  		                <div id="content">
	                  		<?php if(isset($_GET['_escaped_fragment_'])) echo file_get_contents('http://localhost/Tathva--11-Website/loader.php?page='.$_GET['_escaped_fragment_']); ?>
  		                	<!-- Ajax Content -->
                                </div>         
                </div> 
  		<div id = "updatebar">
  		  <div id = "updates"> 
			<div id="ticker-wrapper" class="no-js">
			    <ul id="js-news" class="js-hidden">
				<li class="news-item"><span> National Institute of Technology, Calicut presents Tathva '11 </span></li>	
			    </ul>
			</div>
		  </div>
  		  <div id = "contactsbutton">Contacts [+] </div>
  		  <div id = "social">
  		    <div id="gplus"><g:plusone size="medium" count="false"></g:plusone></div>
  		    <a href="#"><img src="styles/images/twitter.png"></img></a>
  		    <a href="#"><img src="styles/images/facebook.png"></img></a>
  		  </div>  		
  		</div>
  		<div id="footer">
  		<div id="footercontainer">
  		<div id="footerlinks">
  		<ul>
  		<li> <a href="#!initiatives" rel="ajax">Initiatives </a></li>
  		<li> <a href="#!reachus" rel="ajax">Reach Us </a></li>
  		<li> <a href="#!downloads" rel="ajax">Downloads</a></li>
  		<li><a href="http://tathva.org/forum"> Forum</a> </li>
  		<li><a href="#!credits" rel="ajax"> Credits</a> </li>
  		</ul>
  		</div>
  		<div id="contacts">
  		<table>
  		<tr>
  		<th> Publicity </th>
  		</tr>
  		<tr>
  		<td> Rojith Jones</td><td> rojith@tathva.org</td><td>9999999999</td>
  		</tr>
  		<tr>
  		<th> Marketing </th>
  		</tr>
  		 <td>Nitheesh K Pai</td><td> nitheesh@tathva.org</td><td>9999999999</td>
  		</tr>
  		 <td>Sachin Boban</td><td> sachin@tathva.org</td><td>9999999999</td>
  		</tr>
  		 <td>Rashid CMP</td><td> rashid@tathva.org</td><td>9999999999</td>
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
	</body>	
</html>
