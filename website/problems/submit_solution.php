<?php
	session_start();
	if($_SESSION["sloggedin"] != TRUE) {
		header( 'Location: ../dashboard.php' ) ; //One way to redirect
		die();
	}
?>
<html lang="en">	
<head>
	<title>
		Online Judge
	</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<style type="text/css" media="screen">
	    #editor { 
	        position: absolute;
	        top: 0;
	        right: 0;
	        bottom: 0;
	        left: 0;
	    }
	</style>
</head>

<body>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'header.php';
?>

<div  align="center">

<form  method = "POST" action = "./results.php" autocomplete = "off" enctype="multipart/form-data">
		<table border="0" align="center" cellpadding="5" cellspacing="5" >
			<tr>
    			<td>Select Solution File to Upload</td>
    			<td>:</td>
    			<td><input type="file" name="solutionFile" id="solutionFile"></td>
    		</tr>
    		<tr>
    			<input type="hidden" name="problem_id" value='<?php echo $_SESSION["problem_id"]; ?>'>
    		</tr>
       		<tr>
    			<td colspan="3" align="left"><input type = "submit" name = "submit" value = "Submit">  </td>
		    </tr>
    	</table>
   </form>

</div>

<script src="../ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/javascript");
</script>

</body>
</html>
