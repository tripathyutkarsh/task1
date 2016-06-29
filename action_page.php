<?php
session_start();
$conn = oci_connect('system', 'Guddu1234','localhost/orcl');
$username = $_SESSION['username'];
$pid = $_POST['pid'];
if (!$conn) {
	$e = oci_error();
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$stid = oci_parse($conn, "select worth T from player where player_id = '$pid'");
oci_execute($stid);
oci_fetch($stid);
$worth=oci_result($stid,'T');

$count=oci_parse($conn,"select count(*) Y from player where player_id = '$pid' and team='NA'");
oci_execute($count);
oci_fetch($count);
$p=oci_result($count,'Y');

$stid = oci_parse($conn, "select amt_used U,amt_left V from team where name = '$username'");
oci_execute($stid);
oci_fetch($stid);
$left = oci_result($stid, 'V');
$used = oci_result($stid, 'U');

$stid = oci_parse($conn, "select team_id U from team where name = '$username'");
oci_execute($stid);
oci_fetch($stid);
$tid = oci_result($stid, 'U');

if($p==0)
	echo "enter a valid player number";

else if($left < $worth)
{
	die("YOU DONT HAVE ENOUGH AMOUNT TO BUY THIS PLAYER");

}

else
{
	$used = $used + $worth;
	$left = $left - $worth;
	$stid = oci_parse($conn, "update team set amt_used = '$used',amt_left='$left' where name = '$username'");
	oci_execute($stid);
	$stid = oci_parse($conn, "update player set team = '$username', team_id='$tid' where player_id = '$pid'");
	oci_execute($stid);
	echo $used."left".$left;
}
?>

