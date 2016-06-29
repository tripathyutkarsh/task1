<?php
session_start();
if(!isset($_SESSION['username']))
	header("location:fl.php");
?>

<!doctype html>
<html>
<head>

	<title> The Gunners</title>
	<style type="text/css">
		body{
			background-color:black;
			background-image:url(afc.jpg);
			background-repeat:no-repeat;
			background-attachment: fixed;
			background-position: center;
			
		}

		h1{

			color: white;
		}

		#menu {
			width: 100%;
			height: 100px;
			font-size: 25px;
			font-family: Tahoma, sans-serif;
			font-weight: normal;
			text-decoration:none;
			text-shadow: none;
			text-align: center;
			background-color: black;
			background-image:url(pano.jpg),url(new.jpg),url(my2.jpg);
			background-position: right top, center top, left top;
			background-repeat: no-repeat;
			border-radius:8px;
			word-spacing:40px;
		}

		a:link, a:visited {
			background-color: black;
			color: white;
			padding: 14px 25px;
			text-align: center; 
			text-decoration: underline;
			display: inline-block;

		}

		a:hover, a:active {
			background-color: #808080;
		}

		#myteam{
			width:50px;
			height:500px;
			font-size: 14px;
			font-family: Tahoma, Geneva, sans-serif;
			color:black;
			background-color:brown;
			position: fixed;
			bottom: 00px;
			right: 450px;
			width: 417px;
			border: 3px;
			overflow:scroll;

		}

	

	</style>
</head>
<body>
	<h1 align="center" font-style="Calibri" color="red"><i>Gunners<i><h1>
		<div id="menu" align="center">
			<a href="team_g.php">MY_TEAM</a>
			<a href="fl.html">PLAYERS_LIST</a>
			<a href="leaderboard.php">LEADERBOARD</a>
			<a href="transfer.html">BUY_PLAYERS</a>
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