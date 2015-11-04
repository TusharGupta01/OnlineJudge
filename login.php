<?php
include_once 'temp.php';
?>

<title>Sign In</title>
<?php
  if(isset($_POST['loginid']))
  {
      $loginid=$_POST['loginid'];
      $pass=$_POST['pass'];
      $result=mysql_query("select count(*) as cnt,blocked from user where user_id='$loginid' and password='$pass'",$cn) or die(mysql_error());
      $fet = mysql_fetch_array($result);

      if($fet['cnt']==1)  
      {
          if($fet['blocked']=='N')
          {
              $_SESSION['uname']=$loginid;
              $_SESSION['pass']=$pass;
              header("Location:index.php");
          }
      if($fet['blocked']=='Y')
      {
            header("Location:blocked.php");

      }
  }
  else
    echo "failed";
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
      <form method="POST" name="myform" action="login.php" accept-charset="UTF-8" role="form" id="loginform" class="form-signin" >
      <input name="_token" type="hidden" value="snIDVlxZSk7KEJjGcPcP9EmwfyY1lMyIuaU5s8ct">
        <fieldset>
            <h3 class="sign-up-title" style="color:dimgray;">Welcome back! sign in</h3>
            <p id="demo" style="color:red;"></p>
            <hr class="colorgraph">
            <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Username">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password"><br>
            
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" onclick="return check()">
          </fieldset>
        </form>
        <br>
        <a href="register.php"><strong>New user? Click Here</strong></a>
    </div>
    </div>
</div>
    </div>

 
 <script>


function check()
{
var login;
login=document.myform.loginid.value ;
var pass;
pass=document.myform.pass.value;

if(login== "")
   {
    document.getElementById("demo").innerHTML = "Please enter username !!";
     //return false;
     //alert( "Please enter the loginid to be searched!!" );
     //document.myform.loginid.focus() ;
     return false;
     
   }
if(pass=="")
{
document.getElementById("demo").innerHTML = "Please enter password !!";
return false;
}

  
return true;

}
</script>
