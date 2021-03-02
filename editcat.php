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
	include'conn.php';

	if(isset($_GET['fadi']))
	$x=$_GET['fadi'];
$m=mysqli_query($con,"select * from cat where id='$x'");
$row=mysqli_fetch_array($m);

	?>



<div class="container">
	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h1 class="text-center">Edit Category</h1>
				</div>
				<div class="panel-body">
<form action="editcat.php?fadi=<?php echo $x;  ?>" method="post">
	<input type="text" value="<?php echo $row['name']; ?>" class="form-control" name="n"><br>
					<input type="submit" value="Save" name="btn" class="btn btn-success btn-lg">
					
					<a href="mcat.php" class="text-success text-uppercase pull-right">Back</a>
					</form>


				</div>

				<div class="footer">
					<?php

					
					$name=isset($_POST['n'])?$_POST['n']:'';
					if(isset($_POST['btn']))
					{
$r=mysqli_query($con,"update cat set name='$name' where id='$x'");
						if(isset($r))
						{
							echo'
							<div class="alert alert-success">
							<h3>Edit cat suuccessfully</h3></div>

							';
						}

						else{
								echo'
							<div class="alert alert-danger">
							<h3>Edit cat failed</h3></div>

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