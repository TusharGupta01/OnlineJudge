<?php
	session_start();
	if($_SESSION["sloggedin"]) {
		header( 'Location: ./dashboard.php' ) ; //One way to redirect
		die();
	}

?>
<html>	
<head>
	<title>
		Online Judge
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>

<?php
	
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'header.php';
?>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'database_connect.php'; //Includes code to connect to databse

    /***********Following Lines check whether problem with same id or name exists already***********************/
    $sql = "SELECT * FROM problems WHERE problem_id = '$_POST[problemID]' OR problem_name='$_POST[problemName]'";
    //echo "Checking for duplicay ".$sql;
    $result = $conn->query($sql);
    if($result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        if($row["problem_id"] == $_POST["problemID"]) {
            echo "ID exists! Please choose another";                        
        }
        if($row["problem_name"] == $_POST["problemName"]) {
            echo  "Problem Name exists! Please choose another";
        }
        if($row["problem_id"] == $_POST["problemID"] AND $row["problem_name"] == $_POST["problemName"]) {
            echo  "ID and Name exists! Please choose another";                        
        }
    }
    /**********If such problem does not exist try to save the file************************************************/
    else 
    {
        $target_dir = "../problems/". $_POST["problemID"] . "/" ; //The directory where file will be saved
        $target_file = $target_dir . "problem.c";
        if(mkdir($target_dir) == FALSE) {
            $problemIDErr = "Unable to create directory for the problem";
            die(); 
        }
        
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        //Save date(format)a to database
        $sql = "INSERT INTO problemAttempted VALUES ('$_POST[userID]',$_POST[problemID]',now(), solvedintime, 0, 'N', 'o(n)', 'o(n)','c');";
        if($conn->query($sql) == TRUE)
            echo "<h4>Question added succesfuly!</h4>";
        else
        echo "Error adding the question. " . $conn->error;
	}

<div  align="center">

<form  method = "POST" action = "<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete = "off" enctype="multipart/form-data">
		<table border="0" align="center" cellpadding="5" cellspacing="5" >
			<tr>
    	    	<th colspan= "3"> Submit problem </th>
			</tr>
    		<tr>
    			<td>Select Problem File to Upload</td>
    			<td>:</td>
    			<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
    		</tr>
            <tr>
                <td colspan="3">Read the <a href="new_problem_instructions.php" target="_blank">instructions </a> for the specification of the problem file.</td>
            </tr>
    		
    		<tr>
    			<td colspan="3" align="left"><input type = "submit" name = "submit" value = "Submit">  </td>
		    </tr>
	
    	</table>
   </form>

</div>

    