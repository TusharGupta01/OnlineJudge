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
		Faculty Dashboard - OnlineExaminer
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>

<?php
		include 'header.php';
		?>



	<div  align="center">

<h2>
<form><input type="button" class="btn btn-info" value="Create new test" onClick="window.location.href='create_test.php'"></form>
</h2>

<h2>
<form><input type="button" class="btn btn-info" value="Add new question" onClick="window.location.href='add_ques.php'"></form>
</h2>

</div>



</body>

