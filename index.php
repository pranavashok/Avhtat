
<html>

	<head>

		<link href = 'styles/wrapper.css' type='text/css' rel='stylesheet' />
		<script type="text/javascript" src="js/jquery.min.js"></script>
<!--		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>-->
<script type="text/javascript" src="js/jquery.history.js"></script>
		
		<script type="text/javascript" src="js/script.js">
		</script>
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
    				<div style="width:480px;">
              <ul>
                  <li class="oe_heading">Robotics</li>
                  <li><a href="#transpoter" rel="ajax">Transporter</a></li>
                  <li><a href="#leagueofmachines" rel="ajax">League of Machines</a></li>
                  <li><a href="#signalmaestro" rel="ajax">Signal Maestro</a></li>
                  <li><a href="#minotaursmaze" rel="ajax">Minotaur's Maze</a></li>
              </ul>
              <ul>
                  <li class="oe_heading" >Electronics</li>
                  <li><a href="#sonici" rel="ajax">Sonic i</a></li>
                  <li><a href="#lightmusic" rel="ajax">Light Music</a></li>
                  <li><a href="#mousedrive" rel="ajax">Mouse Drive</a></li>
                  <li><a href="#gsm" rel="ajax">GSM</a></li>
              </ul>
              <ul>
                  <li class="oe_heading" >Mechanical</li>
                  <li><a href="#cadquest" rel="ajax">CAD Quest</a></li>
                  <li><a href="#navygator" rel="ajax">NAVYGator</a></li>
                  <li><a href="#incarnate" rel="ajax">Incarnate</a></li>
                  <li><a href="#themi" rel="ajax">The MI</a></li>
              </ul>
              <ul style="clear:both">
                  <li class="oe_heading" >Chemical</li>
                  <li><a href="#cheautic" rel="ajax">Che Autic</a></li>
                  <li><a href="#chemeleon" rel="ajax">CHeMELEON</a></li>
              </ul>
              <ul>
                  <li class="oe_heading">Computer Science</li>
                  <li><a href="#koderkombat" rel="ajax">Koderkombat</a></li>
                  <li><a href="#befunge" rel="ajax">Befunge</a></li>
                  
                
              </ul>
              <ul>
                  <li class="oe_heading">Electrical</li>
                  <li><a href="#coilgun" rel="ajax">Coil Gun</a></li>
                  <li><a href="#interrupteur" rel="ajax">Interrupteur</a></li>
              </ul>
              <ul>
                  <li class="oe_heading">Management</li>
                  <li><a href="#themasterplan" rel="ajax">The Master Plan</a></li>
                  <li><a href="#b-aptist" rel="ajax">B-Aptist</a></li>
                  <li><a href="#businesstycoon" rel="ajax">Business Tycoon</a></li>
                  <li><a href="#blueprint" rel="ajax">Blueprint</a></li>
              </ul>
              <ul>
                  <li class="oe_heading">General</li>
                  <li><a href="#logiq" rel="ajax">LogIQ</a></li>
                  <li><a href="#contraptiion" rel="ajax">Contraption</a></li>
                  <li><a href="#blitzkreig" rel="ajax">Blitzkreig</a></li>
                  <li><a href="#losttreasureoftechila" rel="ajax">Lost Treasure of Techila</a></li>
              </ul>
              <ul>
                  <li class="oe_heading">Online</li>
                  <li><a href="#bullsnbears" rel="ajax">Bulls n Bears</a></li>
                  <li><a href="#clueless" rel="ajax">Clueless</a></li>
                  <li><a href="#opensoftware" rel="ajax">Open Software</a></li>
                  <li><a href="#onlinequiz" rel="ajax">Online Quiz</a></li>
              </ul>
              <ul style="clear:both">
                  <li class="oe_heading">Civil</li>
                  <li><a href="#descartessquare" rel="ajax">Descartes Square</a></li>
                  <li><a href="#erecthion" rel="ajax">eRECthion</a></li>
                  <li><a href="#galleggiante" rel="ajax">Galleggiante</a></li>
              </ul>
    				</div>
    				</li>
    				<li><a href="#">Workshops</a>
    				  <div style="width:320px;">
    				    <ul>
    				      <li class="oe_heading">General</li>
    				      <li><a href="#kiteflying">Kite Flying</a></li>
    				      <li><a href="#painting">Painting</a></li>	
    				      <li><a href="#astrophotography">Astro Photography</a></li>
    				      <li><a href="#careerguidance">Career Guidance</a></li>
    				    </ul>
    				    <ul>
    				      <li class="oe_heading">Technical</li>
    				      <li><a href="#rcplane">RC Plane</a></li>
    				      <li><a href="#ethicalhacking">Ethical Hacking</a></li>
    				      <li><a href="#adobeflash">Adobe Flash</a></li>
    				      <li><a href="#humanoidrobot">Humanoid Robot</a></li> 
    				      <li><a href="#blender3d">Blender 3D</a></li>
    				    </ul>
    				  </div>
    				</li>
    				<li><a href="#">Exhibitions</a></li>
    				<li><a href="#">Lectures</a></li>
    			</ul>
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
    				<li><a href="">Log In</a></li>
    				<li><a href="">Register</a></li>
    			</ul>
    			</div>	
  		</div>
  		  		
  		<div id = "sidebar">
  		
  		</div>
  		
  		<div id = "frontpage">
  		 <div id = "headerlogo">
  		 </div>
  		 <div id = "sponsorbox">
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
  		
  		<div id = "slider">
  		
  		</div>
  	</div>
	</body>	
</html>
