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

            if($tam=='qldiadiem'&& $query=='them')
            {
                include("modules/qldiadiem/them.php"); 
                include("modules/qldiadiem/lietke.php");    
            }
            elseif($tam=='qldiadiem'&& $query=='sua')
            {
                include("modules/qldiadiem/sua.php");    
            }
            
            elseif($tam=='qlnganhnghe'&& $query=='them')
            {
                include("modules/qlnganhnghe/them.php"); 
                include("modules/qlnganhnghe/lietke.php");    
            }
            elseif($tam=='qlnganhnghe'&& $query=='sua')
            {
                include("modules/qlnganhnghe/sua.php");    
            }

            
            elseif($tam=='qlbvuv'&& $query=='them')
            {
                include("modules/qlbvuv/them.php"); 
                include("modules/qlbvuv/lietke.php");    
            }
            elseif($tam=='qlbvuv'&& $query=='sua')
            {
                include("modules/qlbvuv/sua.php");    
            }

            elseif($tam=='qlbvvl'&& $query=='them')
            {
                include("modules/qlbvvl/them.php"); 
                include("modules/qlbvvl/lietke.php");    
            }
            elseif($tam=='qlbvvl'&& $query=='sua')
            {
                include("modules/qlbvvl/sua.php");    
            }
            elseif($tam=='qlbvct'&& $query=='them')
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