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

$stid = oci_parse($conn, "select amt_used U,amt_left V from team where name = '$username'");
oci_execute($stid);
oci_fetch($stid);
$left = oci_result($stid, 'V');
$used = oci_result($stid, 'U');

$count = oci_parse($conn, "select count(*) F from player where team = '$username' and player_id='$pid'");
oci_execute($count);
oci_fetch($count);
$num=oci_result($count,'F');



if($num == 0)
{
	echo"THIS PLAYER IS NOT IN YOUR TEAM";
}

else
{
	$used = $used - $worth;
	$left = $left + $worth;
	$stid = oci_parse($conn, "update team set amt_used = '$used',amt_left='$left' where name = '$username'");
	oci_execute($stid);
	$stid = oci_parse($conn, "update player set team = 'NA',team_id=null where player_id = '$pid'");
	oci_execute($stid);
	echo $used."left".$left;
}

?>

