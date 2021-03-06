<?php
	session_start();
	if($_SESSION["floggedin"] == TRUE) {
		header( 'Location: ./admin_dashboard.php' ) ; //One way to redirect
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
        Admin login - OnlineExaminer
   	</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
                    <li><a>Welcome Admin!</a>
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
				 * encode   :  Encodes the argument string
				 *   Args   :  The string to be encoded
				 *   Returns:  The encoded string.
				 ***********************************************************/
				function encode($ipwd) {
					//Alogrithm to encode pwd goes here
					$encpwd = $ipwd; //The encoded password
					return $encpwd;
				}
				
				/* Following code connects to db,
				 * encodes the password, 
				 * compare userID and encoded pwd with that stored in db,
				 * if matches redirects to logged in page else
				 * sets the loginErr msg as wrong uid or pwd
				 */
				
				
				include '../database_connect.php'; //Includes code to connect to databse
				
				$pwd = encode($_POST["pwd"]);
				
				$sql = "SELECT * FROM admin WHERE admin_id = '$_POST[userid]' AND password = '$pwd'";
				
				$result = $conn->query($sql);

				if($result->num_rows == 1) {
					$row = $result->fetch_assoc();
					$_SESSION["userid"] = $row["admin_id"];
					$_SESSION["username"] = $row["admin_name"];
					$_SESSION["currentStatus"] = $row["currentStatus"];	
					$_SESSION["floggedin"] = TRUE;
					echo '<meta http-equiv="REFRESH" content="0" URL = "./admin_dashboard.php">';
				} 
				else { 
					$loginErr = "Wrong userID or password.";
				} 
			
	
			}
		}
	?>
	
	<form  method = "POST" action = "<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete = "off">
		<table border="0" align="center" cellpadding="5" cellspacing="5" >
			<tr>
    	    	<th colspan= "3"> Admin Login </th>
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
    			<td><input name = "pwd" type = "password" id = "password"></td>
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
   
  </body>
  </html>

