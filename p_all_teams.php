<?php
session_start();
if(!isset($_SESSION['username']))
	header("location:fl.php");
?>

<!doctype html>
<html>
<head>
	
	<title> The Panthers</title>
	<link rel="icon" href="acm.ico" type="image/x-icon">
	<style type="text/css">
		body{
			background-color:black;
			background-image:url(panthers.jpg);
			background-repeat:no-repeat;
			background-attachment: fixed;
			background-position: center ;
			
		}

		h1{

			color: red;
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
			background-image:url(san3.jpg),url(san.jpg),url(san2.jpg);
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

		#fixtures{
			color:brown;
			font-size: 20px;
			background-color: black;
			width:400px;
			position:absolute;
			left:500px;
			top:250px;
		}

		h2{
			color:brown;
		}

		#myteam{
			width:50px;
			height:440px;
			font-size: 14px;
			font-family: Tahoma, Geneva, sans-serif;
			color:brown;
			background-color:black;
			position: fixed;
			bottom: 20px;
			right: 450px;
			width: 417px;
			border: 3px;
			overflow:scroll;

		}

		
	</style>
</head>
<body>
	<h1 align="center" font-style="Calibri" color="red"><i>Panthers<i><h1>
		<div id="menu" align="center">
			<a href="p_team.php">MY_TEAM</a>
			<a href="p_all_teams.php">PLAYERS_LIST</a>
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