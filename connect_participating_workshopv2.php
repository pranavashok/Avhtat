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
		</style>
	</head>
<body>
	<div id="stylized" class="myform"> 
	<div id="content">
		<?php
		require_once("config.php");
		$con = mysql_connect($host, $db_user, $db_password);
		if (!$con) {
			die('Could not connect: ');
		}
		mysql_select_db($db_name,$con) or die("Database doesn't exist");
		$tat_id=mysql_real_escape_string(stripslashes($_POST['tat_id']));
		$workshop_hash=mysql_real_escape_string(stripslashes($_POST['workshop_hash']));
		$query="SELECT max_part, workshop_id FROM workshop WHERE workshop_hash='".$workshop_hash."';";
		$result=mysql_query($query,$con) or die("Query failed");
		$row=mysql_fetch_row($result) or die("Error");
		$j=$row[0];
		$r=2;
		$workshop_id=$row[1];
		$validate=0;
		$a=1;
		while($r<=$j) {
			$w="team_member$r";
			$x = mysql_real_escape_string(stripslashes($_POST[$w]));
			if($x!='') {
				$a++; 
				if (strcmp($_POST["team_leader1"],$x)==0)
					die("Do not enter same Tathva IDs.");
				else {
					$b=2;
					while ($b<$r){
						if(strcmp($_POST["team_member$b"],$x)==0)
							die("Do not enter same Tathva IDs.");	
						$b++;							
					}
				}
				$r++;
			}
			else
				break;
		}
		$r=2;
		$count=1;
		while($r<=$a && $validate!=1) {
			$w="team_member$r";
			$x = mysql_real_escape_string(stripslashes($_POST[$w]));
			if(isset($x)){
				if($x!="") {
					$count++;
					$query="SELECT name FROM participant WHERE tathva_id ='".$x."'";
					$result=mysql_query($query,$con);
					$row1=mysql_fetch_row($result);
					if(!$row1) 
						$validate=1;
					else
						$r++;
				}
			}
		}
		
		if($validate==0){	
			if($count<$j && $j!=1) 
				echo "Your team must include atleast ".$j." members.";
			else {
				$query="SELECT tathva_id FROM team_workshop WHERE tathva_id ='".mysql_real_escape_string($_POST['team_leader1'])."' and workshop_id='".$workshop_id."';";
				$result=mysql_query($query,$con);
				$row3=mysql_fetch_row($result);
				if($row3)
					$u=1;
				if($u!=1) {
					$r=2;
					while($r<=$a && $validate!=1) {
						$w="team_member$r";
						$x = mysql_real_escape_string(stripslashes($_POST[$w]));
						$query="SELECT * FROM team_workshop WHERE tathva_id ='".$x."' and workshop_id='".$workshop_id."';";
						//echo $query."</br>";
						$result=mysql_query($query,$con);
						$row2=mysql_fetch_row($result);
						if($row2)
							$v=1;
						$r++;
					}
					if($v!=1){
						$sql="SELECT max(id) FROM participating_workshop WHERE workshop_id='".$workshop_id."';";
						$result=mysql_query($sql,$con);
						$row=mysql_fetch_row($result);
						if(!$result) {
							$row[0]=1;
							$id=$row[0]+1001;
						}
						else {
							$id=$row[0]+1001;
							$row[0]++;
						}
						$sql="INSERT INTO participating_workshop(id,team_id, tathva_id, workshop_id) VALUES 
						('".$row[0]."','".$workshop_id.$id."','".$tat_id."','".$workshop_id."');";
						//echo $sql;
						$result=mysql_query($sql,$con) or die ("Couldnt insert");
						if($result)
							echo "Your team id is ".$workshop_id.$id;
						$team_id= $workshop_id.$id;
						$sql="SELECT phone FROM participant WHERE tathva_id='".mysql_real_escape_string($_POST['team_leader1'])."';";
						$result=mysql_query($sql,$con);
						$row=mysql_fetch_row($result);
						$r=2;
						$sql="INSERT INTO team_workshop(workshop_id,workshop_team_id,tathva_id, contact_num) VALUES 
								('".$workshop_id."','".$team_id."','".mysql_real_escape_string($_POST['team_leader1'])."','".$row[0]."');";
																	//echo $sql;
						$result=mysql_query($sql,$con) or die("team member not inserted");
						while($r<=$a && $validate!=1) {
							$w="team_member$r";
							$x = mysql_real_escape_string(stripslashes($_POST[$w]));
							if($x!="") {
								$sql="INSERT INTO team_workshop(workshop_id,workshop_team_id,tathva_id, contact_num) VALUES 
								('".$workshop_id."','".$team_id."','".$x."','".$row[0]."');";
								$result=mysql_query($sql,$con) or die("team member not inserted");
								$r++;
							}
						}					
					} else {
						echo "Team member already regisered for the workshop ".$workshop_id;
					}
				}else
					echo "Team leader already registered for the workshop ".$workshop_id;	
			}
		}
		else {
			echo "Invalid Team IDs. Please check it and try again.";
		}
			
		?>
	</div>
	</div>
	</body>

</html>			
