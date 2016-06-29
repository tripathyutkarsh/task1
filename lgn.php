<?php
session_start();
?>
<html>
<head>
	<title>LOGIN PAGE</title>
	<style type="text/css">

		body{
			background: indianred;
		}
		

		form{
			background-color: indianred;
			position: absolute;
			top:35%;
			left:35%;
		}

		#love_msg{
			color:#54FF9F;
			position: absolute;
			top:27%;
			left:35%
		}

		.group{ 
			position:relative; 
			margin-bottom:45px; 
		}

		input{
			background: indianred;
			font-size:18px;
			padding:10px 10px 10px 5px;
			display:block;
			width:300px;
			border:none;
			border-bottom:1px solid black;
		}


		label{	
			color:black; 
			font-size:18px;
			font-weight:normal;
			position:absolute;
			left:5px;
			top:10px;
			transition:0.2s ease all; 
		}

		input:focus ~ label, input:valid ~ label     {
			background: indianred;
			top:-20px;
			font-size:14px;
			color:black;
		}
		
		input[type="submit"]{
			background: green;
			width:80px;
			height:75px;
			border-radius:50%;
			border: none;
			position: absolute;
			left:100px;
		}



	





	</style>
</head>
<body>


	<div id="love_msg">
		<?php if(isset($_SESSION['msg'])) 
		{
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
	</div>



	

		<form action="test2.php" method="POST">	
		<div class="group">
			<INPUT type="text" name="username" required/>
			<label>USERNAME</label>
		</div>
		<div class="group">
			<INPUT type="password" name="password" required/>
			<label>PASSWORD</label>
		</div>

		<INPUT  type="submit" value="LOGIN">
		</form>




	</body>
	</html>