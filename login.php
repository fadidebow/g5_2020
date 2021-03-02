<?php

session_start();
$_SESSION['t']='';
$_SESSION['n']='';

?>

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

	<div class="col-md-2"></div>
	
	<div class="panel panel-success col-md-8 col-xs-12" >
		<div class="panel-heading">
			<h1 class="text-center"> 
		 <i class="glyphicon glyphicon-user"></i> enter your information</h1>
	
		</div>
<div class="panel-body">
	
		
<form action="login.php" method="post">
	

<input placeholder="enter email" type="email" class="form-control"
 name="e"><br>
<input  placeholder="enter password" type="text" class="form-control" name="p" ><br>


<button name="btn" type="submit" class="btn btn-success btn-lg">Log In <i class="glyphicon glyphicon-log-in" ></i></button>
<a href="signup.php"> new member create new account</a>
</form>

</div>
<div class="panel-footer">
	<h3>all right reserved</h3>



<?php
include'conn.php';




$em=isset($_POST['e'])?$_POST['e']:'';
$em=mysqli_real_escape_string($con,$em);
$pass=isset($_POST['p'])?$_POST['p']:'';
$pass=mysqli_real_escape_string($con,$pass);

$pass=md5($pass);

if(isset($_POST['btn']))
{


	$re=mysqli_query($con,"select * from users where email='$em' and password='$pass'");

	if(mysqli_num_rows($re) > 0)
	{
		$row=mysqli_fetch_array($re);
		$_SESSION['n']=$row['name'];
		$_SESSION['id']=$row['id'];
		$_SESSION['t']=$row['type'];

		if($row['type']==0)
		header("Location: admin.php");

	else if($row['type']==1)
		header("Location: company.php");

	else
		header("Location: user.php");
	
	}

	else{
		echo'
		<div class="alert alert-danger"> 
		<h1>you are not member</h1> </div>
		';
	}

}




?>













</div>
		
	</div>

<div class="col-md-2"></div>



</div>





<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>