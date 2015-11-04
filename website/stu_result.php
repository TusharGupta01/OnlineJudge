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
        Student Database
    </title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

</head>


<body>


<p>
 <?php
 $user=$_SESSION['userid'];
 include 'header.php';   
    include 'database_connect.php';

$sql = "SELECT * FROM STU_RECORD where stuID='$user'";
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



</body>
</html> 