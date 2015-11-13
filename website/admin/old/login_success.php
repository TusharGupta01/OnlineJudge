
<?php
echo "string";

if( !isset( $_SESSION['myusername'] ) ){
header("location:dashboard_faculty.php");
}

echo "Welcome, ".$_SESSION['myusername']." - You are now logged in.<br>";

echo "<a href=logout.php>Logout</a>"


?>

