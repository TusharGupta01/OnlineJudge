<?php
include_once 'temp.php';
include_once 'temp2.php';
?>
<head>
  <title>Mini Craigslist</title>
</head>

<body>
<div class="container">


<div class="row">
            <div class="col-lg-12 text-center"><h3>Showing Latest Results from <?php echo $start+1?> to <?php echo $end+$start?></h3></br></div>
</div>
        <div class="row">
		
            <div class="col-md-4"></div>
            <div class="col-md-4">

<?php
    
     $query=mysql_query("SELECT * FROM Ads_info as a,Category1 as c where a.Category=c.ID and a.Display='Y' and a.Blocked='N' order by Time desc limit $start,$end",$cn) or die(mysql_error());
        while($fet = mysql_fetch_array($query))
        {
            $id=$fet['Ads_ID'];
            $src="adphotos/".$id.".jpg";
            
            if(file_exists($src))
            {
                echo "<img src='$src' width='200' height='200'></br>";
            }
            echo "Title -".$fet['Title']."</br>";
            echo "Category -".$fet['Category']."</br>";

            echo "Details -".$fet['Description']."</br>";
            echo "Price - ".$fet['Price']."</br>";
            if($fet['New']=="Y")
                    echo "Brand New </br>";
            if($fet['New']=="N")
                    echo "Used</br>";
            echo "Location -".$fet['Address']."</br>";
            $userquery=mysql_query("SELECT * FROM Post_ads where Ads_ID='$id'",$cn) or die(mysql_error());
            $userfet=mysql_fetch_array($userquery);
            $user=$userfet['Login_ID'];
            echo "<a href='profile.php?user=".$user."' target='_blank'>Contact Me</a></br>";

            echo "</br>";
        }
?>
            </div>
            </div>
</div>

</body>
<script>

function check()
{
    if(document.myform.search.value == "")
   {
     document.getElementById("demo").innerHTML = "Please enter the item to be searched!!";
     return false;
     /*alert( "Please enter the item to be searched!!" );
     document.myform.search.focus();
     return false;*/
     
   }
    return true;
}

</script>
