<?php
	session_start();
	if($_SESSION["sloggedin"] != TRUE) { //i.e. if faculty is not logged in
		header( 'Location: ./index.php' ) ; //One way to redirect
		die();
	}

?>
<html>
	
<head>
	<title>
		
	</title>
	<style>
		.error {color: #FF0000}
	</style>
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
                    <a class="navbar-brand" style=" font-size:30px">Online Examiner</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li><a>Welcome <?php echo $_SESSION["username"]; ?>!</a>
                            </li>
                        <li><a href='./index.php'>Dashboard</a></li>
                        <li>
                            <a href='./logout.php'> Log Out</a></li>
                    </ul>
                </div>
            </div>
                
         </nav>

	<hr>

</body>
</html>