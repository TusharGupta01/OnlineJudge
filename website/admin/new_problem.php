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
		Admin Dashboard - OnlineExaminer
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
        $target_file = $target_dir . "problem.html";
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
        $sql = "INSERT INTO problems VALUES ('$_POST[problemID]','$_POST[problemName]', '$_POST[problemDifficulty]', 0, 0, '$_POST[problemTime]', '$_POST[problemSpace]');";
        if($conn->query($sql) == TRUE)
            echo "<h4>Question added succesfuly!</h4>";
        else
        echo "Error adding the question. " . $conn->error;
    	//if(isset($_POST['tags']){
    		//echo var_dump($_POST['tags']);
			$tags = $_POST['tags'];
		    foreach ($tags as $value) {
	            //echo "tags : ".$value."<br />";
	            $sql = "INSERT INTO problemTags VALUES ('$_POST[problemID]', '$value')";
	            if($conn->query($sql) == TRUE);
		       /*     echo "Tag added succesfuly to database <br>";
		        else
		        	echo "Error adding the tag. " . $conn->error;*/
			}
		//}
    	
        $conn->close();
        $cmd = 'echo "<?php include \'../before_body.php\';" ' . '> ../problems/' . $_POST["problemID"] . '/index.php';
        //echo $cmd;
        exec($cmd);
        $cmd = 'echo "include \'problem.html\';  " ' . ' >> ../problems/' . $_POST["problemID"] . '/index.php';
        exec($cmd);
        $cmd = 'echo "include \'../after_body.php\'; ?> " ' . ' >> ../problems/' . $_POST["problemID"] . '/index.php';
        exec($cmd);

    }
}
?>
<div  align="center">

<form  method = "POST" action = "<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete = "off" enctype="multipart/form-data">
		<table border="0" align="center" cellpadding="5" cellspacing="5" >
			<tr>
    	    	<th colspan= "3"> Fill problem details </th>
			</tr>
    		<tr>
    			<td width = "78">Unique Problem Id</td>	<!--TODO: Send an AJAX request to check if it already exists-->
    			<td width = "6">:</td>
				<td width = "150"><input name = "problemID" type = "text" id = "problemID"></td>
				
    		</tr>
    		<tr>
    			<td>Problem Name</td>
    			<td>:</td>
    			<td><input name = "problemName" type = "text" id = "problemName"></td>
    			
    		</tr>
    		<tr>
    			<td>Problem Difficulty</td>
    			<td>:</td>
    			<td><input name = "problemDifficulty" type = "text" id = "problemDifficulty" maxlength="1"></td>
    			
    		</tr>
            <tr>
                <td>Maximum Time(in sec)</td>
                <td>:</td>
                <td><input name = "problemTime" type = "number" id = "problemTime" min="0" max="10"></td>
            </tr>
            <tr>
                <td>Maximum Space (in MB)</td>
                <td>:</td>
                <td><input name = "problemSpace" type = "number" id = "problemSpace" min="0" max="1000"></td>
            </tr>
            <tr>
                <td>Problems is related to</td>
                <td>:</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="tags[]" value="Dynamic Programming"> Dynamic Programming</td> 
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="tags[]" value="Recursive Programming"> Recursive Programming</td> 
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="tags[]" value="Data Structures"> Data Structures </td> 
                </td>
            </tr>
           <tr>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="tags[]" value="Greedy Algorithms"> Greedy Algorithms </td> 
                </td>
            </tr>
           <tr>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="tags[]" value="Divide and Conquer"> Divide and Conquer </td> 
                </td>
            </tr>
            <tr>
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



</body>
</html>

