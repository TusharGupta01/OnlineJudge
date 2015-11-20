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
		Admin Instructions Uploading - OnlineJudge
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'header.php';
?>


<div>
<p>
Upload file should be HTML. <br>
Problem difficulty can be: 'e' for easy, 'm' for medium and 'h' for hard.
<!--TODO: More instructions go here -->	
</p>
</div>



</body>

