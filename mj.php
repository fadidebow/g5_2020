<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
</head>
<body>

	<?php
	include'adminnav.php';

	?>


	<div class="container">
		<div style="height: 30px;"></div>

		<div class="alert alert-success">
	<h1 class="text-center">Manage Jobs</h1>
</div>
		<table class="table" id="xx">
		<thead>
			<tr>
				<th>Job Name</th>
				<th>Skills</th>
				<th>Company</th>
				<th>Time Of Work</th>
				<th>Salary</th>
				<th>Delete</th>
				<th>Update</th>
			</tr>
		</thead>

		<tbody>
			<?php
			include'conn.php';
			$e=mysqli_query($con,"select * from jobs");

			while($row=mysqli_fetch_array($e))
			{
				echo'
				<tr>
					
					
					<td>'.$row['jobname'].'</td>
					<td>'.$row['skills'].'</td>
					<td>'.$row['companyname'].'</td>
					<td>'.$row['tow'].'</td>
					<td>'.$row['salary'].'</td>


<td> <a href="mj.php?fadi='.$row['id'].'" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i>   </a> </td>



<td> <a href="editjob.php?fadi='.$row['id'].'" class="btn btn-primary">edit <i class="glyphicon glyphicon-edit"></i></a> </td>
					</tr>


				';
			}



		if(isset($_GET['fadi']))
		{
			$x=$_GET['fadi'];

			$t=mysqli_query($con,"delete from jobs where id='$x'");
			if(isset($t)){
				header("Location: mj.php");
			}
		}

			?>
		</tbody>



		
	</table>

	</div>











<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
    $('#xx').DataTable();
} );
</script>
</body>
</html>