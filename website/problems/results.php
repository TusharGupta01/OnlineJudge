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
        printf("$sql<br /><br />");
        if($conn->query($sql) == TRUE)
            printf("New problem Id created succesfully with Id %d.\n", $conn->insert_id);
        else
        echo "Error in creating new problem ID " . $conn->error;

        //Now after an entry in db has been made save the file on server
        $target_dir = "./solutions/"; //The directory where file will be saved
        $target_file = $target_dir . $conn->insert_id . $language;
        if (move_uploaded_file($_FILES["solutionFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["solutionFile"]["name"]). " has been uploaded.<br /><br />";
        } else {
            echo "Sorry, there was an error uploading solution file.";
        }
        $target_solution_file = $target_dir . $conn->insert_id;

        exec("g++ $target_file -o $target_solution_file 2>&1", $output, $return);

        var_dump($output);
        echo " <br >";
        var_dump($return);
        if(file_exists($target_solution_file)) {
            $test_cases_file1 = "./" . $_POST["problem_id"] . "/" . "test1";
            $test_cases_file_output1 = "./" . $_POST["problem_id"] . "/" . "$conn->insert_id" ."test1.output";
            $test_cases_file_actual_output = "./" . $_POST["problem_id"] . "/" . "test1.out";
            echo " <br > SOLUTION:<br >";
            $str = "$target_solution_file < $test_cases_file1 > $test_cases_file_output1";
            echo "$str";
            //place this before any script you want to calculate time
            $time_start = microtime(true); 

            exec("ulimit -t 1 ;$target_solution_file < $test_cases_file1 >$test_cases_file_output1 ", $output, $return);

            $time_end = microtime(true);

            //dividing with 60 will give the execution time in minutes other wise seconds
            $execution_time = ($time_end - $time_start)/60;

            //execution time of the script
            echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
            
            var_dump($output);
            echo " <br >";
            var_dump($return);

            $homepage = file($test_cases_file_actual_output);
            var_dump($homepage);
            $output = file($test_cases_file_output1);
            var_dump($output);
            if(unlink($test_cases_file_output1)) {
                echo "File deleted successfully";
            }
            else {
                echo "File not deleted successfully";   
            }
            echo " <br >";
            if($output == $homepage) {
                $result = "Your solution is correct with execution time $execution_time1 seconds";
                echo "Your solution is correct!";
            }  
            else {
                $result = "Sorry! Your solution is not correct";
                echo "Sorry! Your solution is not correct";
            } 
        }
        else {
            echo "File does not exist yet!<br>";
        }
        
/*
        $test_cases_file2 = "./" . $_POST["problem_id"] . "/" . "test2.out";
        echo " <br > SOLUTION:<br >";
        exec("$target_solution_file < $test_cases_file2 2>&1", $output, $return);

        var_dump($output);
        echo " <br >";
        var_dump($return);*/


        
         $to = "gopalkriagg@gmail.com";
         $subject = "Your code result";
         
         $message = "<b>This is HTML message. Yay!</b>";
         $message .= "<h1>$result</h1>";
         
         $header = "From:gopalkriagg@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true )
         {
            echo "Message sent successfully...";
         }
         else
         {
            echo "Message could not be sent...";
         }
      
    }
    else {
        Redirect('../index.php', false);
    }
?>
</body>
</html>
