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
	<h1 class="text-center">Manage Company</h1>
	<form action="mc.php" method="post">
		<div style="margin: 3px auto;width: 250px;">
		<span><input type="text" name="se" class="form-control" style="width: 68%;display: inline;"></span> 
		<input type="submit" value="Search" style="width: 30%;display: inline;" name="btnse" class="btn btn-success">
	</div>
	</form>
</div>
	<table class="table">
		<tr>
			
			<th>Name</th>
			<th>Description</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Delete</th>
			<th>Update</th>
		</tr>


		<?php
		include'conn.php';
		$searchword=isset($_POST['se'])?$_POST['se']:'';


		if(isset($_POST['btnse']))
		{

$r=mysqli_query($con,"select * from company where name like'%".$searchword."%'");

		if(mysqli_num_rows($r)>0)
		{
			while($row=mysqli_fetch_array($r))
		{

			echo'

					<tr>
					
					<td>'.$row['name'].'</td>
					<td>'.$row['description'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['phone'].'</td>


<td> <a href="mc.php?fadi='.$row['id'].'" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i>   </a> </td>



<td> <a href="editcom.php?fadi='.$row['id'].'" class="btn btn-primary">edit <i class="glyphicon glyphicon-edit"></i></a> </td>
					</tr>
			';

		}
		}
		else{
			echo'<div class="alert alert-danger">
			<h1>No Dtaa found</h1></div>';
		}



		}






		else{

		$r=mysqli_query($con,"select * from company");

		while($row=mysqli_fetch_array($r))
		{

			echo'

					<tr>
					
					
					<td>'.$row['name'].'</td>
					<td>'.$row['description'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['phone'].'</td>


<td> <a href="mc.php?fadi='.$row['id'].'" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i>   </a> </td>



<td> <a href="editcom.php?fadi='.$row['id'].'" class="btn btn-primary">edit <i class="glyphicon glyphicon-edit"></i></a> </td>
					</tr>
			';

		}



		}















		if(isset($_GET['fadi']))
		{
			$x=$_GET['fadi'];

			$t=mysqli_query($con,"delete from company where id='$x'");
			if(isset($t)){
				header("Location: mc.php");
			}
		}


		?>
	</table>
	



</div>













<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>