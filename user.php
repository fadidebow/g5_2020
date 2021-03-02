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

	?>









<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>