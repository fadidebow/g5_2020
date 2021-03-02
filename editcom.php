<?php
session_start();
if($_SESSION['t']!=0)
header("Location: login.php");

include'conn.php';

if(isset($_GET['fadi']))
	$x=$_GET['fadi'];

$result=mysqli_query($con,"select * from company where id='$x'");

$rr=mysqli_fetch_array($result);
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
					<h1 class="text-center">Edit  Company</h1>
				</div>
				<div class="panel-body">
	<form action="editcom.php?fadi=<?php echo $x;  ?>" method="post">
<input type="text" value="<?php echo $rr['name']; ?>" placeholder="company name" class="form-control" name="n"><br>
<label> old Category :<?php 
echo $rr['description'];
?>
</label>
<select name="des" class="form-control">
	<?php
	
$qw=mysqli_query($con,"select * from cat");
while($row1=mysqli_fetch_array($qw))
{
	echo'
<option value="'.$row1['name'].'">'.$row1['name'].'</option>
	';
}

	?>
</select><br>
					
<input type="text" value="<?php echo $rr['address']; ?>" placeholder="address" class="form-control" name="ad"><br>



<input type="text" value="<?php echo $rr['phone']; ?>" placeholder="contact" class="form-control" name="ph"><br>

<input type="submit" value="Save Information" name="btn" class="btn btn-success btn-lg">
					
				
					</form>


				</div>

				<div class="footer">
					<?php

					include'conn.php';
					$name=isset($_POST['n'])?$_POST['n']:'';
					$des=isset($_POST['des'])?$_POST['des']:'';
					$address=isset($_POST['ad'])?$_POST['ad']:'';
					$phone=isset($_POST['ph'])?$_POST['ph']:'';
					if(isset($_POST['btn']))
					{
$r=mysqli_query($con,"update company set name='$name' ,description='$des' ,address='$address' ,phone='$phone'  where id='$x'");
						if(isset($r))
						{
							echo'
							<div class="alert alert-success">
							<h3>Edit Company Data suuccessfully</h3></div>

							';
						}

						else{
								echo'
							<div class="alert alert-danger">
							<h3>Edit Company failed</h3></div>

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