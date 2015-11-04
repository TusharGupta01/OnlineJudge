<?php
include_once 'temp.php';
?>
<title>New Registration</title>
<?php

	if(isset($_POST['name']))
	{
		$loginid=$_POST['loginid'];
		$pass=$_POST['pass1'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$result=mysql_query("INSERT INTO User(user_id,password,user_name,email_id,blocked) values('$loginid','$pass','$name','$email','N')",$cn) or die(mysql_error());
	header("Location:login.php");
      }
?>

<head>

	<style>
		body
		{
			background-position: 0px 55px;
			background-color: #89AAEE;
		}
	</style>

</head>

<body>
		<div class="container">
			<div class="row" style="margin-top:100px;">
				<div class="col-md-4 col-md-offset-4">
					<form method="POST" name="myform" action="register.php" accept-charset="UTF-8" role="form" id="loginform" class="form-signin"><input name="_token" type="hidden" value="snIDVlxZSk7KEJjGcPcP9EmwfyY1lMyIuaU5s8ct">
						<fieldset>
							<h3 class="sign-up-title" style="color:dimgray;">Please sign up</h3>
							<p id="demo" style="color:red"></p>
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
</body>

<script>
function check()
	{
		var emailID = document.myform.email.value;
		atpos = emailID.indexOf("@");
		dotpos = emailID.lastIndexOf(".");
	if(document.myform.name.value=="")
	{
		document.getElementById("demo").innerHTML = "Please enter name!!";
		return false;
	}
	if(document.myform.loginid.value=="")
	{
		document.getElementById("demo").innerHTML = "Please enter loginid!!";
		return false;
	}
	if(document.myform.email.value=="")
	{
		document.getElementById("demo").innerHTML = "Please enter emailid!!";
		return false;
	}
	if (atpos < 1 || ( dotpos - atpos < 2 ))
		{
		//alert("Please enter correct email ID")
		//document.myform.email.focus() ;
		document.getElementById("demo").innerHTML = "Please enter correct email ID";
		return false;
		}
	if(document.myform.phone.value=="")
	{
		document.getElementById("demo").innerHTML = "Please enter phone number!!";
		return false;
	}
	if(document.myform.address.value=="")
	{
		document.getElementById("demo").innerHTML = "Please enter address!!";
		return false;
	}
	if(document.myform.pass1.value=="")
	{
		document.getElementById("demo").innerHTML = "Please enter password!!";
		return false;
	}
	if(document.myform.pass2.value=="")
	{
		document.getElementById("demo").innerHTML = "Please retype password!!";
		return false;
	}
	if(document.myform.pass1.value!=document.myform.pass2.value)
	{
		document.getElementById("demo").innerHTML = "password didn't match with the original. Please retype password!!";
		return false;
	}
	
	return true;
}
</script>
