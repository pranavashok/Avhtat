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
	<div id="heading">	<h1>Workshop Registration</h1></div><p></p>
					<form id= "goform" action="participating_workshops.php" method="get" name="form1">
			 	<label> Tathva ID:
		<span class="small">Team Leader</span>
		</label>  &nbsp;&nbsp;&nbsp; <?php 	$tat_id=$_SESSION['tathvaid']; 
							echo $tat_id;	?>
		<input type="hidden" name="tat_id" value="<?php if (isset($_SESSION['tathvaid'])) echo $_SESSION['tathvaid']; ?>"/><br/><br/>
				<?php 
					require_once("config.php");
					$conn = mysql_connect($host, $db_user, $db_password);
					if((!$conn)){
						die('Could Not Connect :' . mysql_error());
					}
					mysql_select_db($db_name,$conn);
						echo "<br/><label>Name : <span class='small'>Team Leader</span>";
						echo"</label> &nbsp;&nbsp;&nbsp; ".  $_SESSION['name']."<br/>";
							echo "<br/><br/><label>Workshop: </label></div><div style='margin:-20px 230px; width:270px;position:absolute; float:right; color:black;  '>&nbsp;&nbsp;&nbsp;<select style=' color:black; width:180px; ' data-placeholder='Select a workshop.'  name='workshop_hash' class='chzn-select'><br/> ";
							$query="SELECT workshop_id,workshop_name,workshop_hash FROM workshop ORDER BY workshop_name";
							$result=mysql_query($query,$conn);
							$row=mysql_fetch_row($result);
							while($row) {
								if($_GET['workshop_hash']==$row[2]) 
									echo "<option selected value='".$row[2]."'>".$row[1]."</option>";
								else
									echo "<option value='".$row[2]."'>".$row[1]."</option>";
								$row=mysql_fetch_row($result);
							}		
				?>	
						</select>
						<!--<input type="submit" style="width:50px;margin:0; float:right;"  value ="Go" name="part_entry"/>--></div><div id="stylized">
			</form>
			<form action="connect_participating_workshopv2.php" method="post" name="form2" >
				<?php
					if(isset($_GET["workshop_hash"]) && !empty($_GET["workshop_hash"])) {
						//if($row1) {
							$query="SELECT max_part FROM workshop WHERE workshop_hash='".$_GET['workshop_hash']."';";
							$result=mysql_query($query,$conn);
							$row=mysql_fetch_row($result);
							echo "<input type='hidden' name='team_leader1' value='".$_SESSION['tathvaid']."'/><br/><br/>";
							$i=2;
							while($i<=$row[0]) {
								if ($i==2) 
									echo "<span style='margin:0 auto;' class='small'>Enter details of other team members (min ".($row[0]-1).") </span><br/><label>Team Members  : <span class='small'>Enter Tathva IDs</span></label>";
								echo "<label></label><input type='text' name='team_member".$i."'/>";
								if(($i-1)%2==0) echo "<br/><label> &nbsp;</label>";
								$i++;
								if($i>$row[0]) echo "<br/><br/><label>&nbsp;&nbsp;</label>";
			   				}
			   			echo "<input type ='hidden' name='workshop_hash' value='".$_GET['workshop_hash']."'/>";
			   			echo "<input type ='hidden' name='tat_id' value='".$_SESSION['tathvaid']."'/>";
			   			echo "<br/><input type='submit' value='Register'/>";
			   			echo "</form>";
			   			
		   		}
		/*	   	else {
			   		echo "Not Registered for Tathva '11";
			   		echo "</form>";
//			   		echo "<form  action='index.php#!register' method='post' name='form3' >";
//			   		echo "<input type ='submit' value = 'Click here to Register of TATHVA '11'/> ";
//			   		echo "</form>";
			   		echo "</form>";
			   		}*/
			   	
			  ?>

		</div>	  </div> 	
	</body>
</html>
