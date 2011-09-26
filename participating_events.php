<html>
	<head>
		<style type="text/css">
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
margin:2px 0 20px 10px;
-moz-border-radius: 4px;
-webkit-border-radius:4px;
border-radius:4px;
}

#stylized input:focus, textarea:focus{
 	-moz-box-shadow:0 0 9px #fbbb00;
	-webkit-box-shadow:0 0 9px #fbbb00;
	box-shadow:0  0 9px #fbbb00;	
}


#stylized button, #stylized input[type=submit]{
margin-left:270px;
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
padding:7px 26px;
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
	</head>

	<body style="color:white;">
	<div id="stylized" class="myform">
	<div id="heading">	<h1	>Event Registration</h1></div>
			<form action="participating_events.php" method="get" name="form1">
		<label> Tathva ID :
		<span class="small">Enter your Tathva ID</span>
		</label>
		<input type="text" name="tat_id" value="<?php if (isset($_SESSION['tathvaid']))echo $_SESSION['tathvaid']; ?>"/><br/>

				<?php 
					require_once("config.php");
					$conn = mysql_connect($host, $db_user, $db_password);
					if((!$conn)){
						die('Could Not Connect :' . mysql_error());
					}
					if(mysql_select_db($db_name,$conn))  
						$query='SELECT name FROM participant WHERE tathva_id ="'.$_SESSION[tathvaid].'"';//tathva_id compared
						$result=mysql_query($query,$conn);
						$row1=mysql_fetch_row($result);
						$query="SELECT event_id,hash_tag,event_name FROM event WHERE hash_tag='".$_GET['event_id']."';";
						$result=mysql_query($query,$conn);
						$row2=mysql_fetch_row($result);	
						echo "<br/><label>Name : ".$_SESSION['name'];
						echo"<br/>";
						echo "Event : <select name='event_id' /></br> ";
						$query="SELECT event_id,hash_tag,event_name FROM event WHERE hash_tag<>'".$_GET['event_id']."';";
						$result=mysql_query($query,$conn);
						$row=mysql_fetch_row($result);
						while($row) {
								echo "<option selected value='".$row2[1]."'>".$row2[2]."</option>";
								echo "<option value='".$row[1]."'>".$row[2]."</option>";
								$row=mysql_fetch_row($result);
							}		
				?>	
						</select>								
						<input type="submit" value ="Go" name="part_entry"/>
			</form>
			<form action="connect_participating_events.php" method="post" name="form2" >
			<?php
					if(isset($_GET["part_entry"])) {
			if($row1) { 
						$query="SELECT min_part,max_part FROM event WHERE hash_tag='".$_GET['event_id']."';";
						$result=mysql_query($query,$conn);
						$row=mysql_fetch_row($result);
						echo "Team Captain :<input type='text' name='team_leader1' value='".$_GET['tat_id']."'/></br>";
						$i=2;
						while($i<=$row[1]) {
							echo "Member ".$i." :<input type='text' name='team_member".$i."'/></br>";
							$i++;
			   			}
			   			
			   			echo "<input type ='hidden' name='event_id' value='".$_GET['event_id']."'/>";
			   			echo "<input type ='hidden' name='tat_id' value='".$_GET['tat_id']."'/>";
			   			echo "<input type='submit' value='Register'/>";
			   			echo "</form>";
		   		}
			   	else {
			   		echo "Not Registered for TATHVA '11";
			   		echo "</form>";
//			   		echo "<form  action='index.php#!register' method='post' name='form3' >";
//			   		echo "<input type ='submit' value = 'Click here to Register of TATHVA '11'/> ";
//			   		echo "</form>";
					echo "<a href='index.php#!register' target='_parent'>Click here to Register of TATHVA \'11</a>";
			   		}
			   	}
			   	
			   		
			  
			  ?>
	</div>
	</body>
</html>
