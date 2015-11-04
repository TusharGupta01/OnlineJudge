<?php
ob_start();
session_start();
    if(isset($_SESSION['start']) && isset($_SESSION['end']))
{   
        $start=$_SESSION['start'];
	$end=$_SESSION['end'];}
else
{
$start=0;
$end=10;
} 
?> 
<?php
/*include_once 'cn.php';*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Online Judge</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>


<body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                   <a class="navbar-brand" ><img src="21.jpg" style="width:40px;height:35px"></a>
                    <a class="navbar-brand" style="font-size:30px">Online Judge</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href='index.php'>Home</a></li>
                        <li>
                            <?php
                               if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
                            {
                               $loginid=$_SESSION['uname'];
                               $pass=$_SESSION['pass'];
                               $result=mysql_query("select count(*) as cnt from user where user_id='$loginid' and password='$pass' and blocked='N'",$cn) or die(mysql_error());
                               $fet = mysql_fetch_array($result);
                               if($fet['cnt']!=1){
                                  echo "<li><a href='login.php'> sign in</a><li>";
                                  echo "<li><a href='register.php'> sign up</a><li>";
                              } 
                              else{    
                              	  echo "<li><a href='logout.php'>Logout</a></li>";
                                  echo "<li style='color:red ' ><span>Hey! $loginid</span><li>"; 
                              }
                             
                              }
                             else
                             {
                                 echo "<a href='login.php'> sign in</a>";
                                 echo "<li><a href='register.php'> sign up</a><li>";
                              }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
                
         </nav>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
