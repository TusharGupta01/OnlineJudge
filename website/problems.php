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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>


<body>
<?php include 'header.php';?>
<div  align="center">
<p>
 <?php
 include 'database_connect.php'; //Includes code to connect to databse
$sql = "SELECT * FROM problems";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "The marks of the tests that you have appeared for :";
    while($row = $result->fetch_assoc()) {
     echo "<br> Test ID: ". $row["testID"]. "&nbsp|&nbsp Marks: ". $row["marks"];
    }
} else {
    echo "<h3>You have not appeared for any tests.</h3>";
}

?>
</p>


</div>




</body>
</html>