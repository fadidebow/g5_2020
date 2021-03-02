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

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
</head>
<body>
	<?php
	include'usermenu.php';

	?>


	<div class="container">
		<div style="height: 30px;"></div>

		<div class="alert alert-success">
	<h1 class="text-center">My Jobs</h1>
</div>
		<table class="table" id="xx">
		<thead>
			<tr>
				<th>Company Name</th>
			
				<th>My Resume</th>
				<th>Date</th>
				<th>Status</th>
				<th>Download</th>
				<th>Delete</th>
				<th>Update</th>
			</tr>
		</thead>

		<tbody>
			<?php
			include'conn.php';
			$e=mysqli_query($con,"select * from apply");

			while($row=mysqli_fetch_array($e))
			{
				echo'
				<tr>
					
					
					<td>'.$row['companyname'].'</td>
					<td>'.$row['cv'].'</td>
					<td>'.$row['dt'].'</td>
					<td>'.$row['state'].'</td>
					



<td> <a href="cv/'.$row['cv'].'" class="btn btn-warning">Download <i class="glyphicon glyphicon-download"></i>   </a> </td>



<td> <a href="myjob.php?fadi='.$row['id'].'" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i>   </a> </td>



<td> <a href="editmyapply.php?fadi='.$row['id'].'" class="btn btn-primary">edit CV <i class="glyphicon glyphicon-edit"></i></a> </td>
					</tr>


				';
			}



		if(isset($_GET['fadi']))
		{
			$x=$_GET['fadi'];

			$t=mysqli_query($con,"delete from apply where id='$x'");
			if(isset($t)){
				header("Location: myjob.php");
			}
		}

			?>
		</tbody>



		
	</table>

	</div>



















<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
</body>
</html>