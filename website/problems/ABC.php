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
		Problems - OnlineJudge
	</title>
	<link rel="stylesheet" type="../text/css" href="../css/bootstrap.css">
</head>


<body>
<?php include 'header.php';?>
<div  align="center">
<p>
<a href="./problems/ABC.php">Problem ABC</a>
</p>

</div>




</body>
</html>