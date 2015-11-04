<?php
include_once 'temp.php';
?>
<head>
  <title>Online Judge</title>
</head>

<body>
<div class="container">


<div class="row">
           
</div>
        <div class="row">
		
            <div class="col-md-4"></div>
            <div class="col-md-4">

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
