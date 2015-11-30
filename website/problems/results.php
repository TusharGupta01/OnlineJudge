<?php
    session_start();
    if($_SESSION["sloggedin"] != TRUE) {
        header( 'Location: ../dashboard.php' ) ; //One way to redirect
        die();
    }
    function Redirect($url, $permanent = false)
    {
        if (headers_sent() === false)
        {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }
?>
<html lang="en">    
<head>
    <title>
        Online Judge
    </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
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

<?php 
    $language = ".c";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include '../database_connect.php'; //Includes code to connect to databse
        //Record the submission in solutionId table. It also gives us the primary key for the solution.
        $sql = "INSERT INTO solutionId VALUES (NULL, '$_SESSION[userid]','$_POST[problem_id]', now());";
        printf("$sql\n");
        if($conn->query($sql) == TRUE)
            printf("New problem Id created succesfully with Id %d.\n", $conn->insert_id);
        else
        echo "Error in creating new problem ID " . $conn->error;

        //Now after an entry in db has been made save the file on server
        $target_dir = "./solutions/"; //The directory where file will be saved
        $target_file = $target_dir . $conn->insert_id . $language;
        if (move_uploaded_file($_FILES["solutionFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["solutionFile"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading solution file.";
        }
    }
    else {
        Redirect('../index.php', false);
    }
?>
</body>
</html>
