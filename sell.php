<?php
session_start();
$username = $_SESSION['username']; 
?>

<html>
<head>

	<title>Selling Portal</title><br><br><br>
	<link rel="icon" href="ea.ico" type="image/x-icon">
	<style type="text/css">
		body{
			background-color:black;
			background-image:url(sell.png);
			background-repeat:no-repeat;
			background-attachment: fixed;
			background-position: center;
		}

		h1{

			color: red;
		}

		<!--..-->#menu {
			position: absolute; 	
			top:100px;
			width: 100%;
			height: 100px;
			font-size: 25px;
			font-family: Tahoma, sans-serif;
			font-weight: normal;
			text-decoration:none;
			text-shadow: none;
			text-align: center;
			background-color: black;
			background-image:url(my.jpg),url(trc2.jpg),url(fcb2.jpg);
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
		}<!--...-->


		#hd{
			position: absolute;
			top:00px;
			left:600px;
		}
		#hd1{
			position: absolute;
			bottom:250px;
			left:600px;
			color: black;

		}

		#myteam{
			height:290px;
			font-size: 15px;
			font-family: Tahoma, Geneva, sans-serif;
			color:black;
			background-color:brown;
			position: fixed;
			bottom: 10px;
			right: 890px;
			width: 460px;
			border: 3px;
			overflow:scroll;
		}
		#all{
			width:465px;
			height:20px;
			font-size:20px;
			color:black;
			background-color:brown;
			position: fixed;
			bottom: 640px;
			right: 885px;
		}

		#available{
			height:290px;
			font-size: 15px;
			font-family: Tahoma, Geneva, sans-serif;
			color:black;
			background-color:brown;
			position: fixed;
			bottom: 350px;
			right: 870px;
			width: 480px;
			border: 3px;
			overflow:scroll;

		}


		#amount{ 			
			width:415px;
			height:20px;
			font-size: 20px;
			background-color:brown;
			color:black;
			position:fixed;
			bottom:320px;
			right:940px;
		 }
		
	</style>
	<script src="jquery-1.8.0.min.js"></script>
	<script src="script2.js"></script>
</head>
<body>
	<div id="hd1">
			PalyerID:<br>
			<input type="text" name="PlyerID" value="" id="pid"><br>
			<br><br>
			<input type="Submit" value="SELL" id="submit">
		</form>
	</div>
	<div id="hd"><h1 align="center"font-style="Calibri" color="red"><i>Selling Portal</i><br>
	</h1>
</div>
</h1></h1>
<div id="menu" align="center">
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
	$stid = oci_parse($conn, "SELECT * FROM player where team = '$username'");
	oci_execute($stid);
	?>


	<table width="440" border="1">
		<tr>
			<th>ID</th>
			<th> PLAYER</th>
			<th>POSITION</th>
			<th>WORTH</th>
		</tr>
		<?php
		while(($row = oci_fetch_array($stid,OCI_BOTH)) !=FALSE)
		{
			?>	
			<tr>
			<td><?php echo ($row['PLAYER_ID']);?></td>

				<td><?php echo ($row['PLAYER_NAME']);?></td>

				<td><?php echo ($row['POSITION']);?></td>

				<td><?php echo ($row['WORTH']);?></td>

			</tr>   
			<?php
		}
		?>

	</table>
</div>



<div id="all"
<h1 align="center"> AVAILABLE PLAYERS </h1>
</div>



<div id="available">
	<?php 

	$conn = oci_connect('system', 'Guddu1234','localhost/orcl');
	$username = $_SESSION['username'];
	if (!$conn) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	$stid = oci_parse($conn, "SELECT * FROM player where team = 'NA'");
	oci_execute($stid);
	?>


	<table width="465" border="1">
		<tr>
			<th>PLAYER ID</th>
			<th> PLAYER</th>
			<th>POSITION</th>
			<th>RATING</th>
			<th>COST</th>
		</tr>
		<?php
		while(($row = oci_fetch_array($stid,OCI_BOTH)) !=FALSE)
		{
			?>	
			<tr>

				<td><?php echo ($row['PLAYER_ID']);?></td>

				<td><?php echo ($row['PLAYER_NAME']);?></td>

				<td><?php echo ($row['POSITION']);?></td>

				<td><?php echo ($row['RATING']);?></td>

				<td><?php echo ($row['WORTH']);?></td>

			</tr>   
			<?php
		}
		?>

	</table>
</div>



<div id="amount">

	<?php
	$conn = oci_connect('system', 'Guddu1234','localhost/orcl');
	$username = $_SESSION['username'];
	if (!$conn) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	$stid = oci_parse($conn, "SELECT amt_used U,amt_left F FROM team where name = '$username'");
	oci_execute($stid);
	oci_fetch($stid);
	$left = oci_result($stid, 'F');
	$used = oci_result($stid, 'U');
	echo "AMOUNT USED=".$used."   AMOUNT LEFT=".$left;

	
	?>



</body>
</html>