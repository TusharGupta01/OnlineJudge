<?php
	session_start();
	if($_SESSION["sloggedin"] == FALSE && $_SESSION["floggedin"] == FALSE) { //i.e. if both student and faculty are logged out
		header( 'Location: ./index.php' ) ; //One way to redirect
		die();
	}
	
	session_unset(); //Removes all session variables
	session_destroy(); //Destroys the session
	
	echo '<meta http-equiv="REFRESH" content="0" URL = "./index.php?logout=\"y\"">';

?>