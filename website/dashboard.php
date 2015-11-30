<?php
	session_start();
	if($_SESSION["sloggedin"] != TRUE) { //i.e. if student is not logged in
		header( 'Location: ./index.php' ) ; //One way to redirect
		die();
	}

?>
<html>
	
<head>
	<title>
		User Dashboard - OnlineJudge
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>


<body>
<?php include 'header.php';?>
<div  align="center">
<h2>
<form><input type="button" class="btn btn-info" value="View Problems" onClick="window.location.href='problems.php'"></form>

<h2>
<form><input type="button" class="btn btn-info" value="View your solved problems" onClick="window.location.href='show.php'"></form>
</h2>

</div>




</body>
</html>