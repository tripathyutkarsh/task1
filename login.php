<?php
$username = $_POST['username'];
$password = $_POST['password'];
session_start();
$conn = oci_connect('system', 'Guddu1234','localhost/orcl');
if (!$conn) {
	$e = oci_error();
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT count(*)  T FROM log_credential where Username = '$username' and Password = '$password'");
oci_execute($stid);

oci_fetch($stid);

$count=oci_result($stid,'T');


if($count == 0)
{ 

	$_SESSION['msg'] = "Incorrect username or password";
	header("location:fl.php");

}


else
{	
	$_SESSION['username'] = $username;
	$stid=oci_parse($conn,"select url U from log_credential where username='$username' and password='$password'");

	oci_execute($stid);

	oci_fetch($stid);

	$site=oci_result($stid,'U');
	echo $site;

	header("location:$site");
}


?>