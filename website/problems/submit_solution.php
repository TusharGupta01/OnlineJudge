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
<nav class="navbar " role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style=" font-size:30px">Online Judge</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a>Welcome <?php echo $_SESSION["username"]; ?>!</a></li>
        <li><a href='../index.php'>Dashboard</a></li>
        <li><a href='../logout.php'> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<hr>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
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
