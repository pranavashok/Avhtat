<html>

	<head>
		<link rel="icon" type="image/png" href="styles/images/favicon.png" />
		<link href = 'styles/wrapper.css' type='text/css' rel='stylesheet' />
		<link href = 'styles/lavalamp.css' type='text/css' rel='stylesheet' />
		<link href="styles/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
		<link href="styles/coin-slider-styles.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->
    <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<!--		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>-->
<script type="text/javascript" src="js/jquery.history.js"></script>
		<script type="text/javascript" src="js/jquery.lavalamp.1.2.js"></script>
		<script  type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>		
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/coin-slider.js"></script>
		<script type="text/javascript"> 
	
	        $(document).ready(function () {
 
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
		var data = 'page=' + encodeURIComponent(document.location.hash);
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
   		
    			<a href="">
    			<div class="logo"></div>
    			</a>
    			<div class = "oe_wrapper">
    			
    			<ul id="oe_menu" class="oe_menu"> 
    				<li><a href="#">Events</a>
    				<div style="width:640px;">
    				
              <ul>
                  <li class="oe_heading">Robotics</li>
                  <li><a href="#transpoter" rel="ajax">Transporter</a></li>
                  <li><a href="#leagueofmachines" rel="ajax">League of Machines</a></li>
                  <li><a href="#miniaturemouse" rel="ajax">Miniature Mouse</a></li>
                  <li><a href="#signalmaestro" rel="ajax">Signal Maestro</a></li>
                  <li><a href="#robowars" rel="ajax">Robo Wars</a></li>
                  <li><a href="#dirtrace" rel="ajax">Dirt Race</a></li>              
              </ul>
              <ul>
                  <li class="oe_heading" >Mechanical</li>
                  <li><a href="#cadquest" rel="ajax">Contraption</a></li>
                  <li><a href="#incarnate" rel="ajax">Incarnate</a></li>
                  <li><a href="#theoffroadmi" rel="ajax">The Off Road MI</a></li>
                  <li><a href="#amphiboat" rel="ajax">Amphiboat</a></li>
                  <li><a href="#waterrocket" rel="ajax">Water Rocket</a></li>
              </ul>
	      <ul>
                  <li class="oe_heading">General</li>
                  <li><a href="#blueprint" rel="ajax">Blueprint</a></li>
                  <li><a href="#blitzkreig" rel="ajax">Blitzkreig</a></li>
                  <li><a href="#losttreasureoftechila" rel="ajax">Lost Treasure of Techila</a></li>
                  <li><a href="#idp" rel="ajax">Industry Defined Problems</a></li>
              </ul>
              
              <ul>
                  <li class="oe_heading">Online</li>
                  <li><a href="#bullsnbears" rel="ajax">Bulls n Bears</a></li>
                  <li><a href="#clueless" rel="ajax">Clueless</a></li>
              </ul>
              <ul>
                  <li class="oe_heading">Management</li>
                  <li><a href="#b-aptist" rel="ajax">B-Aptist</a></li>
                  <li><a href="#tycoon" rel="ajax">Tycoon</a></li>
              </ul>
              <ul>
                  <li class="oe_heading">Electrical</li>
                  <li><a href="#mousedrive" rel="ajax">Mouse Drive</a></li>
                  <li><a href="#coilgun" rel="ajax">Coil Gun</a></li>
                  <li><a href="#puretricks" rel="ajax">Pure Tricks</a></li>
              </ul>
              <ul>
                  <li class="oe_heading" >Electronics</li>
                  <li><a href="#gsm" rel="ajax">GSM</a></li>
                  <li><a href="#sonici" rel="ajax">Sonic i</a></li>
                  <li><a href="#eracer" rel="ajax">E Racer</a></li>
              </ul>
              <ul>
                  <li class="oe_heading">Civil</li>
                  <li><a href="#erecthion" rel="ajax">eRECthion</a></li>
                  <li><a href="#galleggiante" rel="ajax">Galleggiante</a></li>
                  <li><a href="#descartessquare" rel="ajax">Descartes Square</a></li>
              </ul>
	      <ul>
                  <li class="oe_heading">Computer Science</li>
                  <li><a href="#befunge" rel="ajax">Befunge</a></li>
                  <li><a href="#koderkombat" rel="ajax">Koderkombat</a></li>
                  <li><a href="#tuxofwar" rel="ajax">Tux of War</a></li>               
              </ul>
              <ul>
                  <li class="oe_heading" >Chemical</li>
                  <li><a href="#cheautic" rel="ajax">Che Autic</a></li>
                  <li><a href="#interrepteur" rel="ajax">Interrupteur</a></li>
              </ul>
	      <ul>
                  <li class="oe_heading">Biotechnology</li>
		  <li><a href="#bizbioperzanta" rel="ajax">Bizbio Perzanta</a></li>
                  <li><a href="#inquisitovirtuoso" rel="ajax">Inquisito Virtuoso</a></li>
              </ul>
    				</div>
    				</li>
    				<li><a href="#">Workshops</a>
    				  <div style="width:320px;">
    				    <ul>
    				      <li class="oe_heading">General</li>
    				      <li><a href="#astrophotography">Astro Photography</a></li>
    				    </ul>
    				    <ul>
    				      <li class="oe_heading">Technical</li>
    				      <li><a href="#rcplane">RC Plane</a></li>
    				      <li><a href="#hackattack">Hack Attack</a></li>
    				      <li><a href="#humanoidrobot">Bipedal Humanoid</a></li> 
    				    </ul>
    				  </div>
    				</li>
    				<li><a href="#">Exhibitions</a></li>
    				<li><a href="#">Lectures</a>
				<div style="width:160px;">
    				    <ul>
    				      <li><a href="#drtessythomas">Dr. Tessy Thomas</a></li>
    				      <li><a href="#rajunarayanaswamy">Raju Narayana Swamy</a></li>

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
    				<li><a href="">Register</a></li>
				
    			</ul>
    			</div>	
  		</div>
  		  		
  		<div id = "sidebar">
  		<ul>
  		<li><img src="styles/images/sbinfo.png"/></li>
  		<li><img src="styles/images/sbschedule.png"/></li>
  		<li><img src="styles/images/sbgallery.png"/></li>
  		<li><img src="styles/images/sbsponsorship.png"/></li>
  		<li><img src="styles/images/sbfeedback.png"/></li>
  		</ul>
  		
  		</div>

  		<div id = "frontpage">
  		<div id = "headerlogo">
  		 </div>
		 <div id="slider">
		   <ul id="panels">
		   <li id='panel1'>
		   <div id="text-content">
		   	
		   </div>
		   <a href="#">
			<img src="styles/images/airshow.jpg" alt="1"/>
		   </a>
		   </li>
		   <li id='panel2'>
		   <a href="#">
			<img src="styles/images/cloud.jpg" alt="2"/>
		   </a>
		   </li>
		   <li id='panel3'>
		   <a href="#">
			<img src="styles/images/waterrocket.jpg" alt="3"/>
		   </a>
		   </li>
		   </div>
		   <div id="nav-icons">
			<ul class='lavaLamp'>
				<li id='1'><a href="#"><img src="styles/images/button1.jpg" /></a></li>
				<li id='2'><a href="#"><img src="styles/images/button2.jpg" /></a></li>
				<li id='3'><a href="#"><img src="styles/images/button3.jpg" /></a></li>
			</ul>	
		   </div>
        			
		 </div>
		
  		</div>
  		
  		<div id = "innerpage">
  		                <div id="content">
                                <!-- Ajax Content -->
                                </div>         
                </div> 
  		
  		<div id = "updatebar">
  		  <div id = "updates">This is the updates bar and all updates are going to come here</div>
  		  <div id = "contacts">Contacts [+]</div>
  		  <div id = "social">
  		    <div id="gplus"><g:plusone size="medium" count="false"></g:plusone></div>
  		    <a href="#"><img src="styles/images/twitter.png"></img></a>
  		    <a href="#"><img src="styles/images/facebook.png"></img></a>
  		  </div>  		
  		</div>
  		<div id="footer">
  		<div id="
  		</div>
  	</div>
	</body>	
</html>
