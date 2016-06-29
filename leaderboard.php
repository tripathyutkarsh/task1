<!doctype html>
<html>
<head>
	<title>Fantasy League</title>
	<style type="text/css">
		body{
			background-color:grey;
			background-image:url(lboard.jpg);
			background-repeat:repeat-y;
			color:#8AD9FF;
			font-family:sans-serif;
			text-shadow: 3px 2px 3px #333333;
			
		}
		

		#myteam{
			position: relative;
			background-color:brown;
			width:700px;
			top:00px;
			left:300px;
			color:black;
		}	

		table, th, td {
			border: 1px solid black;
		}
		
		h4{
			font-size: 60px;
			color:black;
		}


	</style>
</head>

<body>
	<h4 align='center'>LEADERBOARD</h4>


	<div id="myteam">
		<?php 
		session_start();
 //require 'dbconnection.php';
		$conn = oci_connect('system', 'Guddu1234','localhost/orcl');
		$username = $_SESSION['username'];
		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
		$stid = oci_parse($conn, "SELECT * FROM leaderboard order by pts desc");
		oci_execute($stid);
		?>
		<table width="700" border="2">
			<tr>
				
				<th>POSITION</th>
				<th>TEAM_ID</th>
				<th>TEAM_NAME</th>
				<th>MATCHES</th>
				<th>GD</th>
				<th>MD</th>
				<th>MW</th>
				<th>PTS</th>
				
				<?php
				$i=1;
				while(($row = oci_fetch_array($stid,OCI_BOTH)) !=FALSE)
				{
					echo "
					<tr>

						<td> $i</td>
						<td>".$row['TEAM_ID']."</td>

						<td>".$row['NAME']."</td>
						
						<td>".$row['MATCHES']."</td>

						<td>".$row['GD']."</td>

						<td>".$row['MD']."</td>

						<td>".$row['MW']."</td>
						
						<td>".$row['PTS']."</td>

					</tr>
					";
					$i++;
				}
				?>
			</table>	

		</div>


	</body>

	</html>