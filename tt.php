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

<?php
	$r=mysqli_query($con,"select * from jobs");
while($row=mysqli_fetch_array($r))
{
	echo'
<div class="col-md-3 mr-2 text-center" >
			<div class="panel panel-success" >
				<div class="panel-heading">
					<h1>'.$row['jobname'].'</h1>
				</div>
				<div class="panel-body" id="pb" style="">
					
			<p>Company : '.$row['companyname'].'</p>
			<h4>Salary :'.$row['salary'].'</h4>
		
				</div>

				<div class="panel-footer">
					<button id="btn"  class="btn btn-success btn-lg">
<i class="glyphicon glyphicon-chevron-down"></i>
					</button></div>
			</div>
		</div>



	';
}



?>


		



		





	</div>
	






</div>








<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$("#btn").click(function(){
			$("#pb").slideToggle();
		});
	});
</script>
</body>
</html>