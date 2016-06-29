<?php
session_start();
?>

<html>
<head>
	<title>REGISTRATION PAGE!</title>
	<style type="text/css">

	body{
		background-color: lightblue;

	}


	form{
		padding-top: 30px;
		background: indianred;
		width:400px;
		position: absolute;
		top: 15%;
		left:35%;

	}

	input{
		background: indianred;
		border: none;
		border-bottom: 1px solid white;
		padding: 18px 18px 18px 18px;
		width:300px;
	}

	.group{
		position:relative;
		left:40px;
		margin-bottom:45px;
		color: white;
	}

	label{
		font-size: 18px;
		color: white;
		position: absolute;
		left:10px;
		top:30px;
		transition: 0.2s;
	}

	input:focus ~ label, input:valid ~ label     {
			background:indianred;
			color:white;
			top:-20px;
			font-size:14px;
			color:white;
		}

	input[type="submit"]{
		background: grey;
		width:130px;
		padding: 10px 10px 10px 10px;
		border-radius: 20px;
		position: relative;
		top:-20px;
		left:125px;
		border: none;
	}

	.err_msg{
		position:absolute;
		background: black;
		left:550px;
		color: red;
	}

	</style>
</head>



<body>


<h1 align="center">WELCOME TO SIS REGISTRATION PORTAL</h1>

<div class="err_msg">

<?php

if (isset($_SESSION['msg']))
{	
	echo ($_SESSION['msg']);
	unset ($_SESSION['msg']);
}


?>
</div>

<form action="test3.php" method="POST">

<div class="group">
<INPUT type="text" name="username" required/>
<label>USERNAME</label>
</div>

<div class="group">
<INPUT type="password" name="password" required/>
<label>PASSWORD</label>
</div>

<div class="group">
<INPUT type="text" name="email" required/>
<label>EMAIL ADDRESS</label>
</div>

<div class="group">
<INPUT type="text" name="dob" required/>
<label>DATE OF BIRTH</label>
</div>

<div class="group">
I ACCEPT THE TERMS AND CONDITIONS <INPUT type="checkbox" name="terms" required/>
</div>

<INPUT type="submit" value="REGISTER">

</form>

</body>
</html>