<?php
session_start();
?>
<!doctype html>
<html>
<head>
			<title>Fantasy League</title>
<style type="text/css">
	body{
			background-color:grey;
			background-image:url(back.jpg);
			background-repeat:repeat-y;
			color:#8AD9FF;
			font-family:sans-serif;
			text-shadow: 3px 2px 3px #333333;
			
		}
			
		#message{ 
		font-size: 15px
		color:black;
		 }	


		 input[type=text] {
    padding:5px; 
    border:2px solid #ccc; 
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

input[type=text]:focus {
    border-color:#333;
}

input[type=submit] {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
			
</style>
</head>
<body>
<h1 align="center"><img src="header.jpg" width=600px height=250px/><h1>
<div id="message" align="center" ><?php if(isset($_SESSION['msg'])) 
{
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
</div>
<p align="center"> Enter Username and Password </p>
<FORM action="login.php" method="post" align="center" >
    <P >
    <LABEL for="firstname">Username </LABEL>
              <INPUT type="text" name="username" id="Username"><BR>
    <LABEL for="lastname">Password </LABEL>
              <INPUT type="password" name="password" id="Password" ><BR>
        <INPUT type="submit" value="LOGIN" > 
    </P>
 </FORM>

</body>
</html>