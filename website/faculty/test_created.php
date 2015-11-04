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
        Create New test - OnlineExaminer
    </title>
    
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>

 <?php
 
	include '../database_connect.php';
	$fac_id    = $_SESSION["userid"];
	$test_id   = $_POST["id"];
	$test_time = $_POST["testtime"];
	//$_POST['ques_list']
	$flag = 0; // flag 1 indicates successful creation of test

	$ques = $_POST['ques_list'];

	 if(empty($ques)) {
	    echo "You didn't select any questions. <br>";
	   $flag = 0;
	 }
	 else {
	 	$N = count($ques);
	 	echo "You selected $N questions(s) for the test $test_id: ";
		
		$sql = "INSERT INTO TESTS (id, given, setBy, time) VALUES ('$test_id', 'N', '$fac_id', $test_time)";
	
 		if ($conn->query($sql) == TRUE) {
			$flag=1;
		}
		
		
  
	  for($i=0; $i < $N; $i++)
	    {
	      $sql1 = "INSERT INTO QUES_CONTAINED (testID, quesID) VALUES ('$test_id', $ques[$i])";
	       
	       if ($conn->query($sql1) == TRUE) {
	       		$flag = 1;
	          echo $ques[$i] . ", ";
		   } 
	        else{
	          $flag=0;
				//echo $conn->connect_error;
	
	          }
	      
	    }
	    echo "<br>";
	
	
	
	 }
	
	if ($flag == 1) {
	    echo "New Test created successfully";
	} else {
	 echo "Test creation failed. try again.";
	 
	}


?>

</body>

</html>