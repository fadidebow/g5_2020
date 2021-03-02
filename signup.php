<!DOCTYPE html>
<html>
<head>
	<title>create acount </title>
	<link rel="stylesheet"
	 type="text/css" href="css/bootstrap.css">
</head>
<body>

	<?php
	include'mainmenu.php';

	?>

<div class="container">
	
	<div class="panel panel-success">
		<div class="panel-heading">
			<h1 class="text-center"> 
		 <i class="glyphicon glyphicon-user"></i> enter your information</h1>
	
		</div>
<div class="panel-body">
	
		
<form action="signup.php" method="post">
	<input placeholder="enter name" type="text" class="form-control" name="n"><br>

<input placeholder="enter phone" type="number" class="form-control" name="ph"><br>
<input placeholder="enter address" type="text" class="form-control" name="adr"><br>
<input placeholder="enter email" type="email" class="form-control"
 name="e"><br>
<input placeholder="enter password" type="password" class="form-control" name="p"><br>


<input type="submit" value="create " class="btn btn-success btn-lg"
 name="btn">
</form>

</div>
<div class="panel-footer">
	<h3>all right reserved</h3>



<?php

include'conn.php';



$name=isset($_POST['n'])?$_POST['n']:'';

$name=mysqli_real_escape_string($con,$name);

$phone=isset($_POST['ph'])?$_POST['ph']:'';
$phone=mysqli_real_escape_string($con,$phone);

$adr=isset($_POST['adr'])?$_POST['adr']:'';
$adr=mysqli_real_escape_string($con,$adr);

$em=isset($_POST['e'])?$_POST['e']:'';
$em=mysqli_real_escape_string($con,$em);

$pass=isset($_POST['p'])?$_POST['p']:'';
$pass=mysqli_real_escape_string($con,$pass);


$pass=md5($pass);


if(isset($_POST['btn']))
{
$re=mysqli_query($con,"insert into 
		users(name,phone,address,email,password)
		values('$name','$phone','$adr','$em','$pass')");

	if(isset($re))
	{
		echo'
		<div class="alert alert-success"> 
		<h1>create account successfully</h1> </div>
		';
	}

	else{
		echo'
		<div class="alert alert-danger"> 
		<h1>create account failed</h1> </div>
		';
	}

}




?>













</div>
		
	</div>





</div>





<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>