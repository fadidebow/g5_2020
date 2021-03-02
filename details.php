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

if(isset($_GET['fadi']))
$x=$_GET['fadi'];
$r=mysqli_query($con,"select * from jobs where id='$x'");
$row=mysqli_fetch_array($r);
	?>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
				<div class="col-md-6">
			<div class="well well-lg">
		<h1 style="color: green">Job Name: <?php echo $row['jobname'];?></h1>
		<hr>
		<h2 style="color: purple;">Skills:<br> <?php echo $row['skills'];?></h2>
		<hr>

		<h4>Company name: <?php echo $row['companyname'];?></h4>
<hr>
<h5> Work Time:  
		<?php echo $row['tow'];?>

				</h5>
				<hr>

				<h4>
					Salary : 
		<?php echo $row['salary'];?>
					

				</h4>

				<hr>


				<button  id="rr" class="btn btn-default">
					Apply To this Job
				</button><br>
				<br>

<div id="ap" style="display: none;">
<form action="details.php?fadi=<?php echo $x;?>" method="post" enctype="multipart/form-data">
		<input type="file" class="form-control" name="f">
					<br>
					<input type="submit" class="btn btn-success" name="btn">
	</form>
				</div>
<?php

$cn=$row['companyname'];
	$username=$_SESSION['n'];

$filename=isset($_FILES['f']['name'])?$_FILES['f']['name']:'';

$file=isset($_FILES['f']['tmp_name'])?$_FILES['f']['tmp_name']:'';
$dt=date("Y-m-d");
$filename=$username.'_'.$dt.'_'.$filename;
if(isset($_POST['btn']))
{
	move_uploaded_file($file, "cv/$filename");

	$q=mysqli_query($con,"insert into apply(
		username,companyname,cv,dt
)values(
'$username',
'$cn',
'$filename',
'$dt'
)");


	if(isset($q))
	{
		echo'
<div class="alert alert-success">
	<h3>apply to job suuccessfully</h3></div>

							';
	}

	else{
		echo'
<div class="alert alert-success">
	<h3>apply to job faield</h3></div>

							';
	}


}


?>

					</div>
					



				</div>
					<div class="col-md-3"></div>
		</div>

	</div>











<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$("#rr").click(function(){
			$("#ap").slideToggle();
		});
	});
</script>
</body>
</html>