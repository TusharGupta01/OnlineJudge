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
		Student Register - OnlineJudge
		</title>
		<link href="css/bootstrap.css" rel="stylesheet">
	</head>
	
	<body>
		<?php
			$registerErr = '';
			if($_SERVER["REQUEST_METHOD"] == "POST") {
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
					
					/*****************************************
					* Following code connects to db,
					* encodes the password,
					* compare userID and encoded pwd with that stored in db,
					* if matches redirects to logged in page else
					* sets the loginErr message as wrong uid or pwd
					*****************************************/
					
					
					include 'database_connect.php'; //Includes code to connect to databse
					
					$pwd = encode($_POST["pass1"]);
					
					$sql = "SELECT * FROM user WHERE user_id = '$_POST[loginid]'";
					$result = $conn->query($sql);
					if($result->num_rows >= 1) {
						$registerErr = "ID exists! Please choose another";
					}
					else {
						//Save data to database
						$sql = "INSERT INTO user VALUES ('$_POST[loginid]', '$pwd', '$_POST[name]', '$_POST[email]', 'n');";
						if($conn->query($sql) == TRUE)
							echo "<h3>Question added succesfuly</h3>";
						else
						echo "Error adding the question. " . $conn->error;
						
						$conn->close();
						$_SESSION["username"] = $_POST["name"];
						$_SESSION["userid"]   = $_POST["loginid"];
						$_SESSION["sloggedin"] = TRUE;
						echo '<meta http-equiv="REFRESH" content="0" URL = "./dashboard.php">'; //Takes user to the dashboard
					}
			}
		?>
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
						<li><a>Register to be a part of IIT Mandi's Online Judge <?php echo $registerErr; ?></a>
					</li>
				</ul>
			</div>
		</div>
		
	</nav>
	<hr>
	<div class="container">
		<div class="row" style="margin-top:100px;">
			<div class="col-md-4 col-md-offset-4">
				<form method="POST" name="myform" action="<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete = "off" accept-charset="UTF-8" role="form" id="loginform" class="form-signin"><input name="_token" type="hidden" value="snIDVlxZSk7KEJjGcPcP9EmwfyY1lMyIuaU5s8ct">
				<fieldset>
					<h3 class="sign-up-title" style="color:dimgray;">Please sign up</h3>
					<p id="registerationForm" style="color:red"></p>
					<hr class="colorgraph">
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
					<input type="text" class="form-control" id="loginid" name="loginid" placeholder="Enter a user name">
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
					<input type="password" class="form-control" id="pass1" name="pass1" placeholder="Enter Password">
					<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Retype Password"><br>
					<input class="btn btn-lg btn-success btn-block" type="submit" value="Register" onclick="return check()">
					
				</fieldset>
			</form>
		</div>
	</div>
</div>
<script>
function check()
	{
		var emailID = document.myform.email.value;
		atpos = emailID.indexOf("@");
		dotpos = emailID.lastIndexOf(".");
	if(document.myform.name.value=="")
	{
		document.getElementById("registerationForm").innerHTML = "Please enter name!!";
		return false;
	}
	if(document.myform.loginid.value=="")
	{
		document.getElementById("registerationForm").innerHTML = "Please enter loginid!!";
		return false;
	}
	if(document.myform.email.value=="")
	{
		document.getElementById("registerationForm").innerHTML = "Please enter emailid!!";
		return false;
	}
	if (atpos < 1 || ( dotpos - atpos < 2 ))
		{
		//alert("Please enter correct email ID")
		//document.myform.email.focus() ;
		document.getElementById("registerationForm").innerHTML = "Please enter correct email ID";
		return false;
		}
	if(document.myform.phone.value=="")
	{
		document.getElementById("registerationForm").innerHTML = "Please enter phone number!!";
		return false;
	}
	if(document.myform.address.value=="")
	{
		document.getElementById("registerationForm").innerHTML = "Please enter address!!";
		return false;
	}
	if(document.myform.pass1.value=="")
	{
		document.getElementById("registerationForm").innerHTML = "Please enter password!!";
		return false;
	}
	if(document.myform.pass2.value=="")
	{
		document.getElementById("registerationForm").innerHTML = "Please retype password!!";
		return false;
	}
	if(document.myform.pass1.value!=document.myform.pass2.value)
	{
		document.getElementById("registerationForm").innerHTML = "password didn't match with the original. Please retype password!!";
		return false;
	}
	
	return true;
}
</script>
</body>
</html>