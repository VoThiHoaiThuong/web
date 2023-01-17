<div class="clear"></div>
<div clas="main">
<?php
       
       if(isset($_GET['action']) && $_GET['query'] )
        {
            $tam=$_GET['action'];
            $query=$_GET['query'];
        }
            else
            {
                $tam= ''; 
                $query=''; 
            }

           
            if($tam=='qlbvvl'&& $query=='them')
            {
                include("modules/qlbvvl/them.php"); 
                include("modules/qlbvvl/lietke.php");    
            }
            elseif($tam=='qlbvvl'&& $query=='sua')
            {
                include("modules/qlbvvl/sua.php");    
            }
            if($tam=='qlbvct'&& $query=='them')
            {
                include("modules/qlbvct/them.php"); 
                include("modules/qlbvct/lietke.php");    
            }
            elseif($tam=='qlbvct'&& $query=='sua')
            {
                include("modules/qlbvct/sua.php");    
            }
            
            else
            {
            include("modules/dashboard.php");
            }
   
         
?>
  </div>