<?php
session_start();
if(!isset($_SESSION['username']))
	header("location:fl.php");
?>

<!doctype html>
<html>
<head>

	<title> Fantasy League</title>
	<style type="text/css">
		body{
			background-color:grey;
			background-image:url(bull.jpg);
			background-repeat:repeat-y;
			
		}
		h1{
			color:blue
		}	

		#menu {
			width: 100%;
			height: 40px;
			font-size: 25px;
			font-family: Tahoma, Geneva, sans-serif;
			font-weight: bold;
			text-align: center;
			text-shadow: 3px 2px 3px #580000;
			background-color:#505050;
			border-radius: 8px;
			word-spacing:40px;
		}	

		#myteam{
			width:50px;
			height:500px;
			font-size: 14px;
			font-family: Tahoma, Geneva, sans-serif;
			color:black;
			background-color:#545050;
			position: fixed;
			bottom: 20px;
			right: 450px;
			width: 417px;
			border: 3px;
			overflow:scroll;

		}
	</body>

</style>
</head>
<body>
<h1 align="center" font-style="Times New Roman" color=#500000 ><a href="bull.php">WELCOME CRUSADERS</a><h1>
		<div id="menu">
			<a href="my_team.php">MY_TEAM</a>
			<a href="all_players.php">PLAYERS_LIST</a>
			<a href="leaderboard.php">LEADERBOARD</a>
			<a href="fl.html">BUY_PLAYERS</a>
			<a href="logout.php">LOGOUT</a>
		</div>


		<div id="myteam">
			<?php 

			$conn = oci_connect('system', 'Guddu1234','localhost/orcl');
			$username = $_SESSION['username'];
			if (!$conn) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
			$stid = oci_parse($conn, "SELECT * FROM player");
			oci_execute($stid);
			?>
			<table width="400" border="1">
				<tr>
					<th>PLAYER</th>
					<th>POSITION</th>
					<th>TEAM</th>
					<?php
					while(($row = oci_fetch_array($stid,OCI_BOTH)) !=FALSE)
					{
						?>	

						<tr>

							<td><?php echo ($row['PLAYER_NAME']);?></td>

							<td><?php echo ($row['POSITION']);?></td>

							<td><?php echo nl2br($row['TEAM']."\n");?></td>
						</tr>

						<?php
					}
					?>
				</table>	

			</div>

			<br></br>
			<br></br>



		</body>
		</html>