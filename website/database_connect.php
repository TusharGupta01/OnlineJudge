<?php
	$servername =      "localhost";
	$username   =           "root";
	$password   =        "abc.xyz";
	$db         = "OnlineExaminer";
	
	$conn = new mysqli($servername, $username, $password, $db);
	
	if($conn->connect_error) {
		die("Connection to database failed: " . $conn->connect_error);
	}

	echo "<br>";
?>