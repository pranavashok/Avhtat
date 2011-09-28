<?php  session_start(); ?>
<html>
	<head>
		<style type="text/css">
		#content {
    font-family:arial;
    font-size:13px;
    display:none;
    color:white;
    display: block;
    margin: 0 20px 0 20px;
    padding-top:0px;
    height:500px;
} 
		
		#stylized{
/*border:solid 2px #b7ddf2;*/
background:transparent;
}
#stylized h1 {
font-size:22px;
font-weight:bold;
margin-bottom:8px;
color: #bfff00;
}
#stylized a{
color:#bfff00;
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #ccc;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:220px;
float:left;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:220px;
}
#stylized input, textarea{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 5px 10px;
-moz-border-radius: 4px;
-webkit-border-radius:4px;
border-radius:4px;
}

#stylized select{
	width:200px;
	float:left;
	margin:2px 0 20px 10px;
}

#stylized input:focus, textarea:focus{
 	-moz-box-shadow:0 0 9px #fbbb00;
	-webkit-box-shadow:0 0 9px #fbbb00;
	box-shadow:0  0 9px #fbbb00;	
}


#stylized button, #stylized input[type=submit]{
margin-left:250px;
margin-top:10px;
cursor:pointer;
-moz-border-radius:10px;
-webkit-border-radius:10px;
border-radius:10px;
-moz-box-shadow:0 1px 0 rgba(0,0,0,0.3);
-webkit-box-shadow:0 1px 0 rgba(0,0,0,0.3);
box-shadow:0 1px 0 rgba(0,0,0,0.3);
background: -moz-linear-gradient(19% 75% 90deg, #E0E0E0, #FAFAFA);
background: -webkit-gradient(linear, left top, left bottom, from(#FAFAFA), to(#E0E0E0));
color:#4A4A4A;
font-family:arial,helvetica,sans-serif;
font-size:14px;
font-weight:bold;
padding:4px 14px;
width:100px;
text-shadow:1px 1px 0 rgba(255, 255, 255, 0.7);
}

#stylized button:hover , #stylized input[type=submit]:hover{
background: -moz-linear-gradient(19% 75% 90deg,#D6D6D6, #FAFAFA);
background: -webkit-gradient(linear, left top, left bottom, from(#FAFAFA), to(#D6D6D6));
	-moz-box-shadow:0 0 4px white;
	-webkit-box-shadow:0 0 4px white;
	box-shadow:0  0 4px white;	
}

		</style>
	<link href='styles/chosen.css' type='text/css' rel='stylesheet' />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/chosen.jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function () {
	$(".chzn-select").change(function(){
		$("#goform").submit();
	});
	 $(".chzn-select").chosen({no_results_text: "No event"});
	});
	</script>
	</head>

	<body style="background-color:#000;">
	<div id="content">
	<div id="stylized" class="myform"> 
	<div id="heading">	<h1>Event Registration</h1></div><p></p>
			<form id="goform" action="participating_events.php" method="get" name="form1">
		<label> Tathva ID:
		<span class="small">Team Captain</span>
		</label>  &nbsp;&nbsp;&nbsp; <?php echo $_SESSION['tathvaid'];?>
		<input type="hidden" name="tat_id" value="<?php if (isset($_SESSION['tathvaid'])) echo $_SESSION['tathvaid']; ?>"/><br/><br/>
	
				<?php  
					require_once("config.php");
					$conn = mysql_connect($host, $db_user, $db_password);
					if((!$conn)){
						die('Could Not Connect :' . mysql_error());
					}
					mysql_select_db($db_name,$conn);
						$query="SELECT event_id,event_hash,event_name FROM event WHERE event_hash='".$_GET['event_hash']."';";
						$result=mysql_query($query,$conn);
						$row2=mysql_fetch_row($result);	
						echo "<br/><label>Name : <span class='small'>Team Captain</span>";
						echo"</label> &nbsp;&nbsp;&nbsp; ".  $_SESSION['name']."<br/>";
						echo "<br/><br/><label>Event: </label></div><div style='margin:-20px 230px; width:290px;position:absolute; float:right; color:black;  '>&nbsp;&nbsp;&nbsp;<select style=' color:black; width:180px; ' data-placeholder='Select an event.'  name='event_hash' class='chzn-select'><br/> ";
						$query="SELECT event_id,event_hash,event_name FROM event ORDER BY event_name;";
						$result=mysql_query($query,$conn);
						$row=mysql_fetch_row($result);
						//echo "<option></option>";
						while($row) {
								
								echo "<option value='".$row[1]."'";
								if ($_GET['event_hash'] == $row[1])
								{
								echo " selected = 'true' ";
								}
								echo ">".$row[2]."</option>";
								$row=mysql_fetch_row($result);
							}		
				?>	
						</select><!--<input type="submit" style="width:50px;margin:0; float:right;" value ="Go" name="part_entry"/>--></div><div id="stylized">								
			</form>
			<br/><form action="connect_participating_events.php" method="post" name="form2" >
			<?php
					if(isset($_GET["event_hash"]) && !empty($_GET["event_hash"])) {
					//if($row1) { 
						$query="SELECT min_part,max_part FROM event WHERE event_hash='".$_GET['event_hash']."';";
						$result=mysql_query($query,$conn);
						$row=mysql_fetch_row($result);
						echo "<input type='hidden' name='team_leader1' value='".$_SESSION['tathvaid']."'/></br>";
						$i=2; 
						while($i<=$row[1]) {
							if ($i==2) echo "<span style='margin:0 auto;' class='small'>Enter details of other team members</span><br/><label>Team Members  : <span class='small'>Enter Tathva IDs</span></label>";
							echo "<label></label><input type='text' name='team_member".$i."'/>";
							if(($i-1)%2==0) echo "<br/><label> &nbsp;</label>";
							$i++;
							if($i>$row[1]) echo "<br/><br/><label>&nbsp;&nbsp;</label>";
			   			}
			   			echo "<input type ='hidden' name='event_hash' value='".$_GET['event_hash']."'/>";
			   			echo "<input type ='hidden' name='tat_id' value='".$_SESSION['tathvaid']."'/>";
			   			echo "<br/><input type='submit' value='Register'/>";
			   			echo "</form>";
		   			} 
	/*		   	else {
			   		echo "Not Registered for TATHVA '11";
			   		echo "</form>";
//			   		echo "<form  action='index.php#!register' method='post' name='form3' >";
//			   		echo "<input type ='submit' value = 'Click here to Register of TATHVA '11'/> ";
//			   		echo "</form>";
					echo "<a href='index.php#!register' target='_parent'>Click here to Register of TATHVA \'11</a>";
			   		}
			   	}*/
			   	
			   		
			  
			  ?>
	</div>
	
	</div>
	</body>
</html>
