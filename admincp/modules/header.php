<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:http://localhost:8080/web_vieclam/index.php');
	}
?>

<p><a href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
		echo $_SESSION['dangnhap'];

	} ?></a></p>
	<!-- <p><a href="http://localhost:8080/web_vieclam/index.php">Trang chủ</a></p> -->
	