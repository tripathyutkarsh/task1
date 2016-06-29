<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$dob=$_POST['dob'];


if(filter_var($email,FILTER_VALIDATE_EMAIL)!=true)
	{ 
		$_SESSION['msg']="PLEASE ENTER A VALID EMAIL ID";
	  	header("location:regpage.php");
	}

?>
