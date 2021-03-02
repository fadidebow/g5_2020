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
					<h1 class="text-center">Add New Job</h1>
				</div>
				<div class="panel-body">
	<form action="addjob.php" method="post">
<input type="text" placeholder="Job name" class="form-control" name="n" required><br>

<textarea class="form-control" name="sk"></textarea><br>
<label>Select company :</label>
<select name="com" class="form-control" required>
	<?php
	include'conn.php';

$qw=mysqli_query($con,"select * from company");
while($row1=mysqli_fetch_array($qw))
{
	echo'
<option value="'.$row1['name'].'">'.$row1['name'].'</option>
	';
}

	?>
</select><br>
					
<input type="text" placeholder="Time of work" class="form-control" name="ti" required><br>



<input type="text" placeholder="salary" class="form-control" name="sa" required><br>

<input type="submit" value="add new Job" name="btn" class="btn btn-success btn-lg">
					
				
					</form>


				</div>

				<div class="footer">
					<?php

					include'conn.php';
					$name=isset($_POST['n'])?$_POST['n']:'';
					$skills=isset($_POST['sk'])?$_POST['sk']:'';
					$com=isset($_POST['com'])?$_POST['com']:'';
					$ti=isset($_POST['ti'])?$_POST['ti']:'';
					$sa=isset($_POST['sa'])?$_POST['sa']:'';
					if(isset($_POST['btn']))
					{
$r=mysqli_query($con,"insert into jobs(jobname,skills,companyname,tow,salary) values('$name','$skills','$com','$ti','$sa')");
						if(isset($r))
						{
							echo'
							<div class="alert alert-success">
							<h3>add Job suuccessfully</h3></div>

							';
						}

						else{
								echo'
							<div class="alert alert-danger">
							<h3>add Job failed</h3></div>

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