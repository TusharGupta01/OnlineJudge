<?php
	session_start();
	if($_SESSION["sloggedin"] != TRUE) { //i.e. if faculty is not logged in
		header( 'Location: ../../index.php' ) ; //One way to redirect
		die();
	}

?>
<html>
	
<head>
	<title>
		Problem - OnlineExaminer
	</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
</head>

<body>

<?php
	
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include '../header.php';
?>


<div  align="left">
<!--Problems goes here-->
