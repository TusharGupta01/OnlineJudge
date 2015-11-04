<!DOCTYPE html>
<html>

<head>
<style>
.error {color: #FF0000;}
</style>
<title>Enroll new student - Franklin University</title>
</head>

<body>

<a href="index.html" > HOME </a> <tab id=t1> <a href="directory.html"> DIRECTORY</a>
<hr>
<br><br>
<?php
$fnameErr = $lnameErr = $progidErr = $rollnumErr ="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
$x = TRUE;
if (empty($_POST["rollnum"])) {
$rollnumErr = "Roll Number is required";
$x = FALSE;
}
if (empty($_POST["fname"])) {
$fnameErr = "First name is required";
$x = FALSE;
}
if(empty($_POST["lname"])) {
$lnameErr = "Last name is required";
$x = FALSE;
}
if(empty($_POST["progid"])) {
$progidErr = "Program id needs to be specified";
$x = FALSE;
}

if ($x ) {
$servername =    "localhost";
$username   =         "root";
$password   =        "mysql";
$db         = "franklin_uni";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error) {
die("Connection to database failed: " . $conn->connect_error);
}

echo "<br>";

$sql = "INSERT INTO STUDENTS values('$_POST[rollnum]', '$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[fathername]', '$_POST[mothername]', '$_POST[gender]', '$_POST[bdate]', '$_POST[address]', '$_POST[enrolldate]', $_POST[curyear], '$_POST[progid]');";
#echo $sql;
if($conn->query($sql) == TRUE)
echo "<h3>$_POST[fname] $_POST[mname] $_POST[lname] is enrolled succesfuly</h3>";
else
echo "Error enrolling the student. " . $conn->error;

$conn->close();
}
}
?>
<h2>Enter student's details</h2>
<hr>
<span class = "error"> * Represents required field </span>
<br><br>
<form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method = "POST" >
Roll Number: <input type="text" name="rollnum" maxlength="7">
<span class = "error">* <?php echo $rollnumErr;?> </span>
<br><br>
First name: <input type="text" name="fname" maxlength="20">
<span class = "error">* <?php echo $fnameErr;?> </span>
<br><br>
Middle name initials: <input type="text" name="mname" maxlength="2">
<br><br>
Last name: <input type="text" name="lname" maxlength="25">
<span class = "error">* <?php echo $lnameErr;?> </span>
<br><br>
Father's name: <input type="text" name="fathername" maxlength="45">
<br><br>
Mother's name: <input type="text" name="mothername" maxlength="45">
<br><br>
Gender:
<input type="radio" name="gender" value="f">Female
<input type="radio" name="gender" value="m">Male
<br><br>
Birth Date: <input type="date" name="bdate"> <br>
Default format is yyyy-mm-dd
<br><br>
Address: <input type="text" name="address" maxlength="60">
<br><br>
Enrollment Date: <input type="date" name="enrolldate" value="<?php echo date(Y-m-d)?>"> <br>
Default format is yyyy-mm-dd
<br><br>
Current Year: <input type="text" name="curyear" min="0" max="7">
<br><br>
ID of program of study: <input type="text" name="progid">
<span class = "error"> * <?php echo $progidErr; ?> </span>
<br><br>
<input type = "submit" name="submit" value="Submit">
</form>
</body>
</html>
