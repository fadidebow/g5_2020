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
					<h1 class="text-center">Add New Category</h1>
				</div>
				<div class="panel-body">
					<form action="cat.php" method="post">
						<input type="text" class="form-control" name="n"><br>
					<input type="submit" value="add new category" name="btn" class="btn btn-success btn-lg">
					<br>
					<a href="mcat.php" class="text-success text-uppercase pull-right">Go To Categories Management</a>
					</form>


				</div>

				<div class="footer">
					<?php

					include'conn.php';
					$name=isset($_POST['n'])?$_POST['n']:'';
					if(isset($_POST['btn']))
					{
						$r=mysqli_query($con,"insert into cat(name) values('$name')");
						if(isset($r))
						{
							echo'
							<div class="alert alert-success">
							<h3>add cat suuccessfully</h3></div>

							';
						}

						else{
								echo'
							<div class="alert alert-danger">
							<h3>add cat failed</h3></div>

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