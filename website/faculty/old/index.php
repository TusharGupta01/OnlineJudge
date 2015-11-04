<!DOCTYPE html>
<html>
<head>
	<title>
		Faculty login
	</title>
</head>
<body>

<?php

if (!$_POST) {

	$filename=$_SERVER["PHP_SELF"]; 

	echo "
	
	<table width=\"300\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#CCCCCC\">
	<tr>
	<form name=\"form1\" method=\"post\" action=\"$filename\">
	<td>
	<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#FFFFFF\">
	<tr>
	<td colspan=\"3\"><strong>Faculty Login </strong></td>
	</tr>
	<tr>
	<td width=\"78\">User Id</td>
	<td width=\"6\">:</td>
	<td width=\"294\"><input name=\"myusername\" type=\"text\" id=\"myusername\"></td>
	</tr>
	<tr>
	<td>Password</td>
	<td>:</td>
	<td><input name=\"mypassword\" type=\"password\" id=\"mypassword\"></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><input type=\"submit\" name=\"Submit\" value=\"Login\"></td>
	</tr>
	</table>
	</td>
	</form>
	</tr>
	</table>

	<a  href=\"register_faculty.php\" > new Faculty? </a>


	";

     

} 
else 

{

	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password="sqlpass"; // Mysql password 
	$db_name="OnlineExaminer"; // Database name 
	$tbl_name="FACULTY"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	// username and password sent from form 
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword']; 

	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$sql="SELECT * FROM $tbl_name WHERE id='$myusername' and pwd='$mypassword'";
	$sql1="SELECT name FROM $tbl_name WHERE id='$myusername' and pwd='$mypassword'";
	$result1=mysql_query($sql1);
	
	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
		$_SESSION["myusername"] = $_POST['myusername'];
		header('Location: login_success.php');









	}
	else {
		header('Location: index.php');

	echo "Wrong Username or Password
	<br>
	<a href=\"index.php\"> Wanna try again? </a>

	";

	}

   
    
}





?>


</body>
</html>

