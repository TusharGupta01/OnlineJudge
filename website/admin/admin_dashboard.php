<?php
	session_start();
	if($_SESSION["floggedin"] != TRUE) { //i.e. if faculty is not logged in
		header( 'Location: ./index.php' ) ; //One way to redirect
		die();
	}

?>
<html>
	
<head>
	<title>
		Admin Dashboard - OnlineExaminer
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>

<?php
		include 'header.php';

		?>



	<div  align="center">

<h2>
<form><input type="button" class="btn btn-info" value="Create new problem" onClick="window.location.href='new_problem.php'"></form>
</h2>


</div>



</body>

