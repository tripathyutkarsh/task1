<?php
session_start();
if(!isset($_SESSION['username']))
	header("location:fl.php");
?>

<!doctype html>
<html>
<head>

	<title> The Galacticos</title>
	<link rel="icon" href="rma.ico" type="image/x-icon">
	<style type="text/css">
		body{
			background-color:black;
			background-image:url(gal.jpg);
			background-repeat:no-repeat;
			background-attachment: fixed;
			background-position: center top;
			
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
			background-image:url(ngb.jpg),url(my.jpg),url(bernpan.jpg);
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
			color:black;
			font-size: 20px;
			background-color:purple;
			width:400px;
			position:relative;
			left:500px;
		}

		h2{
			color:black;
		}


	</style>
</head>
<body>
	<h1 align="center" font-style="Calibri" color="red"><i>..<i><h1><br>
		<div id="menu" align="center">
			<a href="g_players.php">MY_TEAM</a>
			<a href="g_all_players.php">PLAYERS_LIST</a>
			<a href="leaderboard.php">LEADERBOARD</a>
			<a href="transfer.html">BUY_PLAYERS</a>
			<a href="logout.php">LOGOUT</a>
		</div>

		<div id="fixtures">

			<h2> UPCOMING FIXTURES </h2>

			<?php 
			$conn = oci_connect('system', 'Guddu1234','localhost/orcl');
			if (!$conn) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
			$stid = oci_parse($conn, "SELECT * FROM fixtures where team_id = 4 or opp_team_id=4");
			oci_execute($stid);
			?>
			<table width="400" border="2" align='center'>
				<tr>
					<th>TEAM_ID</th>
					<th>OPP_TEAM_ID</th>
					<th>DATE</th>
				</tr>
				<?php
				while(($row = oci_fetch_array($stid,OCI_BOTH)) !=FALSE)
				{
					?>	
					<tr>
						<td><?php echo ($row['TEAM_ID']);?></td>

						<td><?php echo ($row['OPP_TEAM_ID']);?></td>

						<td><?php echo ($row['MATCH_DATE']);?></td>

					</tr>   
					<?php
				}
				?>

			</table>
		</div>	

		</div>
		<br></br>
		<br></br>



	</body>
	</html>