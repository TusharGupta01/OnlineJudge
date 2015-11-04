<head>
<style>
 
 .active{
 	font-size: 35px;
 }
 .sidebar {
    position: fixed;
    top: 51px;
    bottom: 0px;
    left: 0px;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto;
    background-color: #F5F5F5;
  border-right: 1px solid #EEE;
}

</style>
</head>

<body>
<br><br>
<div  style="padding-left:40% ;background-color:#F5F5F5;padding-top:13px;padding-bottom:5px;">
	<form class="navbar-form navbar-left" name="myform" role="search" method="POST" action="ads.php" >
		<div class="form-group">
    		<input type="text" class="form-control" id="search" name="search" placeholder="Enter Item To Search">
    	</div>

    		<button type="submit" class="btn btn-default" onclick="return check()">Search</button>
	</form>
        <form class="navbar-form navbar-left" name="startend" role="search" method="POST" action="startend.php" >
		<div class="form-group">
    		<input type="number"  id="start" name="start" value= "<?php echo $start+1?>" >
   		<input type="number"  id="end" name="end" value= "<?php echo $start+$end?>" >
               	</div>
    		<button type="submit" class="btn btn-default">Update</button>
	</form>

<br>
<br>
	<h5 style="padding-left:20px"><a href="adpost.php"><strong>Post an Advertisement</strong></a></h5>
	<p id="demo" style="color:red;"></p>
</div>

<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active">Category<span class="sr-only">(current)</span></li><br>
            <li style="font-size:20px"> <?php
            $query=mysql_query("SELECT * FROM Category1 order by Category",$cn) or die(mysql_error());
            while($fet = mysql_fetch_array($query))
            {
                  echo "<a href='ads.php?cat=".$fet['ID']."'>".$fet['Category']."</a>";
            }
           ?></li>
          </ul>
        </div>
      </div>
</div>


   
</body>
