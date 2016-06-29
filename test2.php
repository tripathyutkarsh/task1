<?php

$Username=$_POST['username'];
$Password=$_POST['password'];
session_start();


if($Username=="baka" && $Password=="bedi")
{
	$_SESSION['msg']="YOU HAVE BEEN LOGGED IN";
	header("location:lgn.php");
}

else
{
	$_SESSION['msg']="WRONG USERNAME/PASSWORD";
	header("location:lgn.php");	
}




?>