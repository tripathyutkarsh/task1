<?php
session_start();
if(!isset($_SESSION['username']))
	header("location:fl.php");
?>

<!doctype html>
<html>
<head>

	<title>The Crusaders</title><br><br><br>
	<link rel="icon" href="fcb.ico" type="image/x-icon">
	<style type="text/css">
		body{
			background-color:black;
			background-image:url(fcb.jpg);
			background-repeat:no-repeat;
			background-attachment: fixed;
			background-position: center;
		}

		h1{

			color: black;
		}

		#menu {
			position: absolute; 	
			top:175px;
			width: 100%;
			height: 100px;
			font-size: 25px;
			font-family: Tahoma, sans-serif;
			font-weight: normal;
			text-decoration:none;
			text-shadow: none;
			text-align: center;
			background-color: black;
			background-image:url(fcb1.jpg),url(fcb2.jpg),url(fcb3.jpg);
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


		#hd{
			position: absolute;
			top:00px;
			left:600px;
		}



			#myteam{
			width:50px;
			height:350px;
			font-size: 14px;
			font-family: Tahoma, Geneva, sans-serif;
			color:black;
			background-color:violet;
			position: fixed;
			bottom:10px;
			right: 450px;
			width: 417px;
			border: 3px;
			overflow:scroll;

		}

	</style>
</head>
<body>
	<div id="hd">
		<h1 align="center"font-style="Calibri" color="red"><i>The Crusaders</i><br>
		</h1>
	</div>
</h1></h1>
<div id="menu" align="center">
	<a href="b_team.php">MY_TEAM</a>
	<a href="b_all_teams.php">PLAYERS_LIST</a>
	<a href="leaderboard.php">LEADERBOARD</a>
	<a href="transfer.html">BUY_PLAYERS</a>
	<a href="logout.php">LOGOUT</a>
</div>
<br></br>
<br></br>

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


</body>
</html>