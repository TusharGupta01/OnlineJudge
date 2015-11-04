<?php
  session_start();
  if($_SESSION["floggedin"] != TRUE) { //i.e. if faculty is not logged in
    header( 'Location: ./index.php' ) ; //One way to redirect
    die();
  }

?>

<?php
include '../database_connect.php';
 include 'header.php';
?>

<html>
<head>
    <title>
        Create New test
    </title>
    
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>



<h2>Fill up details of the test</h2>

<form  action="test_created.php" method="post">
 ID: <input type="text" name="id">
<br>
<br>
Test Duration: <input type="text" name="testtime">
<br>
<br>
<b>Select the questions that you want in the test:</b>

<br>
<?php

$ques_list = array();
$question = "SELECT * FROM QUESTIONS";   
$q_result = $conn->query($question);


     while($row1 = $q_result->fetch_assoc())
        {  

        
                    echo "<br><input type = 'checkbox'
            name='ques_list[]' value='$row1[id]'>";
                    echo "".$row1['id'].".".$row1['descr']."<br>";
                    
            

        }




?>

<input type="submit" value="Submit">
</form>
</body>

</html>