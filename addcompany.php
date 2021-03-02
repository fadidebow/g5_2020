<?php
session_start();
if($_SESSION['t']!=0)
header("Location: login.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
		<link rel="stylesheet"
	 type="text/css" href="css/bootstrap.css">
</head>
<body>

	<?php
	include'adminnav.php';

	?>



<div class="container">
	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h1 class="text-center">Add New Company</h1>
				</div>
				<div class="panel-body">
	<form action="addcompany.php" method="post">
<input type="text" placeholder="company name" class="form-control" name="n"><br>

<select name="des" class="form-control">
	<?php
	include'conn.php';
$qw=mysqli_query($con,"select * from cat");
while($row1=mysqli_fetch_array($qw))
{
	echo'
<option value="'.$row1['name'].'">'.$row1['name'].'</option>
	';
}

	?>
</select><br>

<select name="owner" class="form-control">
	<?php
	include'conn.php';
$qw1=mysqli_query($con,"select * from users where type=1");
while($row12=mysqli_fetch_array($qw1))
{
	echo'
<option value="'.$row12['id'].'">'.$row12['name'].'</option>
	';
}

	?>
</select><br>
					
<input type="text" placeholder="address" class="form-control" name="ad"><br>



<input type="text" placeholder="contact" class="form-control" name="ph"><br>

<input type="submit" value="add new Company" name="btn" class="btn btn-success btn-lg">
					
				
					</form>


				</div>

				<div class="footer">
					<?php

					include'conn.php';
					$name=isset($_POST['n'])?$_POST['n']:'';
					$owner=isset($_POST['owner'])?$_POST['owner']:'';
					$des=isset($_POST['des'])?$_POST['des']:'';
					$address=isset($_POST['ad'])?$_POST['ad']:'';
					$phone=isset($_POST['ph'])?$_POST['ph']:'';
					if(isset($_POST['btn']))
					{
$r=mysqli_query($con,"insert into company(name,description,address,phone,uid) values('$name','$des','$address','$phone','$owner')");
						if(isset($r))
						{
							echo'
							<div class="alert alert-success">
							<h3>add Company suuccessfully</h3></div>

							';
						}

						else{
								echo'
							<div class="alert alert-danger">
							<h3>add Company failed</h3></div>

							';
						}
					}


					?>
				</div>
			</div>
		</div>

		<div class="col-md-3"></div>
		

	</div>
</div>













<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>