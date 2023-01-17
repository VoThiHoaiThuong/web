<?php
// goi file tuong tac voi csdl
include('../../config/config.php');
	
$tendiadiem =$_POST['tendiadiem'];

	//  thêm
	if(isset($_POST['themdm']))
{
		 // lay du lieu tu bang
		 $sql_them = "insert into diadiem(tendiadiem) VALUE('$tendiadiem') ";
		 // ket noi csdl
		 mysqli_query($mysqli,$sql_them);
		 header('location:../../index.php?action=qldiadiem&query=them');
}
//Sửa
elseif(isset($_POST['suadm'])){
	// lay du lieu tu bang
		$sql_update = "update diadiem set tendiadiem='$tendiadiem' where id_diadiem='$_GET[id_diadiem]' ";
		// ket noi csdl
		mysqli_query($mysqli,$sql_update);
		header('location:../../index.php?action=qldiadiem&query=them');
}
// xóa
else{
	$id=$_GET['id_diadiem'];
	$sql_xoa = "delete from diadiem where id_diadiem='$id'";
	mysqli_query($mysqli,$sql_xoa );
	header('location:../../index.php?action=qldiadiem&query=them');
}
?>