<?php
 if (isset($_SESSION['email'])){
  unset($_SESSION['email']);
  }
 ?> 
 
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['email']);
		header('Location:http://localhost:8080/web_vieclam/index.php');
	}
?>
<p><a href="http://localhost:8080/web_vieclam/index.php">Trang chủ</a></p>

