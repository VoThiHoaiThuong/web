<?php
// goi file tuong tac voi csdl
include('../../config/config.php');
	
$tennganhnghe =$_POST['tennganhnghe'];

	//  thêm
	if(isset($_POST['themnn']))
{
		 // lay du lieu tu bang
		 $sql_them = "insert into nganhnghe (tennganhnghe) VALUE('$tennganhnghe') ";
		 // ket noi csdl
		 mysqli_query($mysqli,$sql_them);
		 header('location:../../index.php?action=qlnganhnghe&query=them');
}
//Sửa
elseif(isset($_POST['suann'])){
	// lay du lieu tu bang
		$sql_update = "update nganhnghe set tennganhnghe='$tennganhnghe' where id_nganhnghe='$_GET[id_nganhnghe]' ";
		// ket noi csdl
		mysqli_query($mysqli,$sql_update);
		header('location:../../index.php?action=qlnganhnghe&query=them');
}
// xóa
else{
	$id=$_GET['id_nganhnghe'];
	$sql_xoa = "delete from nganhnghe where id_nganhnghe='$id'";
	mysqli_query($mysqli,$sql_xoa );
	header('location:../../index.php?action=qlnganhnghe&query=them');
}
?>