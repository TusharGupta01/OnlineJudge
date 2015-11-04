<?php
	session_start();
	if($_SESSION["sloggedin"] != TRUE) { //i.e. if student is not logged in
		header( 'Location: ./index.php' ) ; //One way to redirect
		die();
	}
?>

<?php
	include 'database_connect.php';
	include 'header.php';
	
	$idTest=$_GET["idTest"];
	
	$sql1 = "SELECT time FROM TESTS WHERE id = '$idTest'";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
	$time = $row1['time'];
	
	
	
	
	$sql2    = "SELECT quesID FROM QUES_CONTAINED WHERE testID = '$idTest'";
	$result2 = $conn->query($sql2);
	$length  = $result2->num_rows;
	
	
	$_SESSION['quiz'] = $idTest;
	$_SESSION['length'] = $length;
	$_SESSION['time'] = $time;
?>

<html>
<head>
    <title>Quiz <?php echo "$idTest";?> - OnlineExaminer</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
  
 <body>
    <div id="container" style="margin-left: 30px;">

	
	<!-- create the header using the quiz id and name -->
	<h1 style="text-align: center;">Quiz <?php echo $idTest ;?>: </h1>
	<h2>Instructions :</h2>
	<br>

	<h4>1.The quiz will have a total of <?php echo $length ;?> questions.</h4>
	<h4>2.Maximum time allowed for the Quiz <?php echo $time ;?> minutes.</h4>
	<h4>3.Do not click on back of refresh buttons during the test otherwise test would be automatically submitted.</h4>
	<h4></h4>
	<br>
	<h3> Best of Luck! </h3>
	<button class="btn btn-info" onClick="parent.location='start.php'">Begin Quiz</button>
	
	</div>
</body>
</html>