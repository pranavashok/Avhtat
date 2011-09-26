<html>
	<body>
		<?php
			 require_once("config.php");
			   $con = mysql_connect($host, $db_user, $db_password);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db($db_name,$con) or die("Database doesn't exist");
			$query="SELECT min_part,max_part FROM event WHERE hash_tag='".$_POST['event_id']."';";
			$result=mysql_query($query,$con) or die("Query failed");
			$row=mysql_fetch_row($result) or die("Error");
			$i=$row[0];
			$j=$row[1];
			//echo "i = $i";
			//echo "j = $j";
			$r=2;
			$validate=0;
		    $a=1;
			while($r<=$j) {
				$w="team_member$r";
				if($_POST[$w]!="") {
					$a++; 
					$r++;
				}
				else
					break;
			}
			//echo $_POST['team_leader1'];
			$r=2;
			echo $a;
			while($r<=$a && $validate!=1) {
				$w="team_member$r";
				if(isset($_POST[$w])) {
					$query="SELECT name FROM participant WHERE tathva_id ='".$_POST[$w]."'";
					//echo $query;
					$result=mysql_query($query,$con);
					$row1=mysql_fetch_row($result);
					if(!$row1) 
						$validate=1;
					else
						$r++;
				
				}
			}
			if($validate==0){
			
				if($_POST[team_member.$i]=='' && $i!=1) 
					echo "Not enough members";
				else {
					$query="SELECT teammember_id FROM team WHERE teammember_id ='".$_POST['team_leader1']."' and event_id='".$_POST['event_id']."';";
				//echo $query;
					$result=mysql_query($query,$con);
					$row3=mysql_fetch_row($result);
					echo $row3."</br>";
					if($row3)
						$u=1;
					if($u!=1) {
						$r=2;
						while($r<=$a && $validate!=1) {
							$w="team_member$r";
							$query="SELECT teammember_id FROM team WHERE teammember_id ='".$_POST[$w]."' and event_id='".$_POST['event_id']."';";
							//echo $query."</br>";
							$result=mysql_query($query,$con);
							$row2=mysql_fetch_row($result);
							if($row2)
								$v=1;
							$r++;
							}
						if($v!=1){
							$sql="SELECT max(id) FROM participating WHERE event_id='".$_POST['event_id']."';";
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
							$sql="INSERT INTO participating(id,team_id, tathva_id, event_id) VALUES 
							('".$row[0]."','".$_POST['event_id'].$id."','".$_POST['tat_id']."','".$_POST['event_id']."');";
							$result=mysql_query($sql,$con) or die ("Couldnt insert");
							if($result)
								echo "Your team id is ".$_POST['event_id'].$id;
							$team_id= $_POST['event_id'].$id;
							$sql="SELECT contact_num FROM participant WHERE tathva_id='".$_POST['team_leader1']."';";
							$result=mysql_query($sql,$con);
							$row=mysql_fetch_row($result);
							$r=2;
							$sql="INSERT INTO team(event_id,team_id,teammember_id, contact_num) VALUES 
									('".$_POST['event_id']."','".$team_id."','".$_POST['team_leader1']."','".$row[0]."');";
							//		echo $sql;
									$result=mysql_query($sql,$con) or die("team member not inserted");
							while($r<=$a && $validate!=1) {
								$w="team_member$r";
								if($_POST[$w]!="") {
									$sql="INSERT INTO team(event_id,team_id,teammember_id, contact_num) VALUES 
									('".$_POST['event_id']."','".$team_id."','".$_POST[$w]."','".$row[0]."');";
								//	echo $sql;
									$result=mysql_query($sql,$con) or die("team member not inserted");
									$r++;
									}
							}
						}
						else {
							echo "Team member already regisered for the event ".$_POST['event_id'];
							
						}
					}
					else
						echo "Team leader already registered for the event ".$_POST['event_id'];	
			
				}
				}
			else {
			echo "Team member ".$r." not registered";
			}
			
		?>
	</body>

<html>			
