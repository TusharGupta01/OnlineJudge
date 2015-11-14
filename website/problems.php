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
    $n = 'Name';
    $pc = 'Problem Code';
    echo "The available problems are: <br>";
    echo '<pre>';
    printf("<strong>%20s%50s\n</strong>", $pc, $n);
    while($row = $result->fetch_assoc()) {
    	$problem_id = '<a href=\'./problems/'. $row["problem_id"]. '\'>'. $row["problem_id"]. '</a>';
    	printf("%20s%50s<br>", $problem_id , $row["problem_name"]);
    }
    echo '</pre>';
} else {
    echo "<h3>No available problem.</h3>";
}

?>
</p>


</div>




</body>
</html>