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
		Student Dashboard - OnlineExaminer
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>


<body>
<?php include 'header.php';?>
<div  align="center">
<h2>
<form><input type="button" class="btn btn-info" value="Appear for a test" onClick="window.location.href='test.php'"></form>

<h2>
<form><input type="button" class="btn btn-info" value="See results of tests" onClick="window.location.href='stu_result.php'"></form>
</h2>

</div>




</body>
</html>