<?php
// test.php displays all the possible tests the student can give
	session_start();
	if($_SESSION["sloggedin"] != TRUE) { //i.e. if student is not logged in
		header( 'Location: ./index.php' ) ; //One way to redirect
		die();
	}

?>
<html>
<head>
	<title>
		Tests available - OnlineExaminer
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>


<body>
	<?php include 'header.php';?>
	<?php
	
	include 'database_connect.php';
	$sql = " SELECT a.name, b.id FROM FACULTY a, TESTS b WHERE b.setBy = a.id AND b.id  NOT IN  ( SELECT testID AS id FROM STU_RECORD WHERE stuID ='$_SESSION[userid]');"; 
	//SELECT * FROM TESTS WHERE NOT EXISTS ( SELECT testID FROM STU_RECORD WHERE stuID = '$_SESSION[userid]')"; //Proper validation of query to be checked
	
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<h3>Select the test that you want to appear for:</h3>" ;

	    
	    while ($row = $result->fetch_assoc()) {
	        echo "<br> ID: " . $row["id"] . "&nbsp|&nbsp Set By: " . $row["name"] . "&nbsp|&nbsp <a href=\"quiz.php?idTest=$row[id] \"> Give Test </a><br>";
	    }
	} 
	else {
	    echo "There are no available tests.";
	}
	
	?>
	<br>
	<br>
	
	
</body>
</html>
