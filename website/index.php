<?php
	session_start();
	if($_SESSION["sloggedin"]) {
		header( 'Location: ./dashboard.php' ) ; //One way to redirect
		die();
	}

?>

<!DOCTYPE html>

<html>
	
<head>
	<style>
		.error {color: #FF0000}
	</style>
    <title>
        Student login - OnlineJudge
   	</title>
   	   <link href="css/bootstrap.css" rel="stylesheet">
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
                    <li><a>Welcome to the IIT Mandi's own Online Judge!</a>
                            </li>
                    </ul>
                </div>
            </div>
                
         </nav>

	<hr>

	<?php
		if($_GET["logout"] == "y") {
			echo "You have been successfully logged out.<br>";
		}
		$useridErr = $pwdErr = $loginErr = "";
		$x = TRUE;
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST["userid"])) {
				$useridErr = "Username is required";
				$x = FALSE;
			}
			if(empty($_POST["pwd"])) {
				$pwdErr = "Password is required";
				$x = FALSE;
			}
			elseif(strlen($_POST["pwd"]) < 8) {
				$pwdErr = "Password must be 8 characters long.";
				$x = FALSE;
			}
		

			if($x == TRUE) {
				/***********************************************************
				 * encode   : here it Encodes the argument string
				 *   Args   :  The string to be encoded
				 *   Returns:  The encoded string.
				 ***********************************************************/
				function encode($ipwd) {
					//Alogrithm to encode pasword goes here
					$encpwd = $ipwd; //The encoded password
					return $encpwd;
				}
				
				/* Following code connects to db,
				 * encodes the password, 
				 * compare userID and encoded pwd with that stored in db,
				 * if matches redirects to logged in page else
				 * sets the loginErr message as wrong uid or pwd
				 */
				
				
				include 'database_connect.php'; //Includes code to connect to databse
				
				$pwd = encode($_POST["pwd"]);
				
				$sql = "SELECT * FROM user WHERE user_id = '$_POST[userid]' AND password = '$pwd'";
				$result = $conn->query($sql);
				if($result->num_rows == 1) {
					$row = $result->fetch_assoc();
					$_SESSION["username"] = $row["user_name"];
					$_SESSION["userid"]   = $row["user_id"];
					$_SESSION["currentStatus"] = $row["blocked"]; //Current status was used to check whether currently logged in or not	
					$_SESSION["sloggedin"] = TRUE;
					echo '<meta http-equiv="REFRESH" content="0" URL = "./dashboard.php">'; //Takes us to the dashboard
				} 
				else {
					$loginErr = "Wrong userID or password.";
				} 
	
			}
		}
	?>
	
	<form  method = "POST" action = "<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete = "off">
		<table width="600" border="0" align="center" cellpadding="5" cellspacing="5" >
			<tr>
    	    	<th colspan= "3"> Student Login </th>
			</tr>
    		<tr>
    			<td width = "78">User Id</td>
    			<td width = "6">:</td>
				<td width = "150"><input name = "userid" type = "text" id = "userid"></td>
				<td width = "300"><span class = "error"> <?php echo $useridErr; ?> </span> </td>
    		</tr>
    		<tr>
    			<td>Password</td>
    			<td>:</td>
    			<td><input name = "pwd" type = "password" id = "password"  maxlength = "30"></td>
    			<td width = "300"><span class = "error"> <?php echo $pwdErr; ?> </span> </td>
    		</tr>
    		<tr>
    			<td colspan="3" align="center"><input type = "submit" name = "Submit" value = "Login">  </td>
		    </tr>
		    <tr>
		    	<td colspan="3" align = "center"><span class = "error" ><?php echo $loginErr; ?></span></td>
		    </tr>
    	</table>
   </form>
   <form><input type="button" class="btn btn-info" value="No account?" onClick="window.location.href='register.php'"></form>
   <!-- TODO: Combine registeration on this page only>
   
  </body>
  </html>