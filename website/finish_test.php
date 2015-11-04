<?php
	session_start();
	if($_SESSION["sloggedin"] != TRUE) { //i.e. if student is not logged in
		header( 'Location: ./index.php' ) ; 
		die();
	}
	if($_SERVER["REQUEST_METHOD"] != "POST") {
		header( 'Location: ./stu_dashboard.php' ) ; 
		die();
	}

?>

<html>
<head>
    <title>Quiz <?php echo "$idTest";;?></title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>)
  
<body>
	<?php
		include './database_connect.php';
		include 'header.php';
		$marks = 0;
		$sql = "SELECT correct_ans, counter from $_SESSION[table_name];";
		$ques_details = $conn->query($sql);
		
		while( $row = $ques_details->fetch_assoc()) {
			if($_POST["$row[counter]"] == $row["correct_ans"]) {
				$marks = $marks+1;
			}
		}
		$sql = "INSERT INTO STU_RECORD values('$_SESSION[userid]', '$_SESSION[quiz]', $marks);";
		$conn->query($sql);
		
		echo "Yours marks in the test are $marks";
	
	?>
</body>
</html>
   