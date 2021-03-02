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
<div class="alert alert-success">
	<h1 class="text-center">Manage Category</h1>
	<form action="mcat.php" method="post">
		<div style="margin: 3px auto;width: 250px;">
		<span><input type="text" name="se" class="form-control" style="width: 68%;display: inline;"></span> 
		<input type="submit" value="Search" style="width: 30%;display: inline;" name="btnse" class="btn btn-success">
	</div>
	</form>
</div>
	<table class="table">
		<tr>
			
			<th>Name</th>
			<th>Delete</th>
			<th>Update</th>
		</tr>


		<?php
		include'conn.php';
		$searchword=isset($_POST['se'])?$_POST['se']:'';


		if(isset($_POST['btnse']))
		{

$r=mysqli_query($con,"select * from cat where name like'%".$searchword."%'");

		while($row=mysqli_fetch_array($r))
		{

			echo'

					<tr>
					
					<td>'.$row['name'].'</td>


<td> <a href="mcat.php?fadi='.$row['id'].'" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i>   </a> </td>



<td> <a href="editcat.php?fadi='.$row['id'].'" class="btn btn-primary">edit <i class="glyphicon glyphicon-edit"></i></a> </td>
					</tr>
			';

		}



		}






		else{

		$r=mysqli_query($con,"select * from cat");

		while($row=mysqli_fetch_array($r))
		{

			echo'

					<tr>
					
					<td>'.$row['name'].'</td>


<td> <a href="mcat.php?fadi='.$row['id'].'" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i>   </a> </td>



<td> <a href="editcat.php?fadi='.$row['id'].'" class="btn btn-primary">edit <i class="glyphicon glyphicon-edit"></i></a> </td>
					</tr>
			';

		}



		}















		if(isset($_GET['fadi']))
		{
			$x=$_GET['fadi'];

			$t=mysqli_query($con,"delete from cat where id='$x'");
			if(isset($t)){
				header("Location: mcat.php");
			}
		}


		?>
	</table>
	



</div>













<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>