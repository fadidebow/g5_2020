<?php
session_start();
if($_SESSION['t']!=2)
header("Location: login.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php
	include'usermenu.php';

	include'conn.php';




	?>
<div class="container">

<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h1 class="text-center">Register my Company</h1>
				</div>
				<div class="panel-body">
	<form action="reg.php" method="post">
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

					
<input type="text" placeholder="address" class="form-control" name="ad"><br>



<input type="text" placeholder="contact" class="form-control" name="ph"><br>

<input type="submit" value="add new Company" name="btn" class="btn btn-success btn-lg">
					
				
					</form>


				</div>

				<div class="footer">
					<?php

					include'conn.php';
					$name=isset($_POST['n'])?$_POST['n']:'';
					$owner=$_SESSION['id'];
					$des=isset($_POST['des'])?$_POST['des']:'';
					$address=isset($_POST['ad'])?$_POST['ad']:'';
					$phone=isset($_POST['ph'])?$_POST['ph']:'';
					if(isset($_POST['btn']))
					{
$r=mysqli_query($con,"insert into company(name,description,address,phone,uid) values('$name','$des','$address','$phone','$owner')");

$r1=mysqli_query($con,"update users set type=1 where id='$owner'");
						if(isset($r))
						{
							echo'
							<div class="alert alert-success">
							<h3>add Company suuccessfully</h3></div>

							';

echo'<meta http-equiv="refresh" content="0.5;url=login.php"/>';
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