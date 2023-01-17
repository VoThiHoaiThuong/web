<?php
// goi file tuong tac voi csdl
include('../../config/config.php');
	
$nganhnghe =$_POST['nganhnghe'];
$tenungvien =$_POST['tenungvien'];
$luong =$_POST['luong'];
$diadiem =$_POST['diadiem'];
$tenbaiviet =$_POST['tenbaiviet'];
$mota =$_POST['mota'];
// xử lí hình ảnh
$hinhanh =$_FILES['hinhanh']['name'];
$hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];

$ngaydang =$_POST['ngaydang'];
$tinhtrang =$_POST['tinhtrang'];


// tmp_name biến tạm của hình ảnh

//  thêm
	if(isset($_POST['thembv'])){
		 // lay du lieu tu bang
		 $sql_them = "insert into baivietuv(id_nganhnghe,tenungvien,luong,id_diadiem,tenbaiviet,mota,hinhanh,ngaydang,tinhtrang) VALUE('$nganhnghe','$tenungvien','$luong','$diadiem','$tenbaiviet','$mota','$hinhanh','$ngaydang','$tinhtrang') ";
		 // ket noi csdl
		 mysqli_query($mysqli,$sql_them);
		 //phải upload hình ảnh
		 move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		 header('location:../../index.php?action=qlbvuv&query=them');
}
//Sửa
elseif(isset($_POST['suabv'])){
	//có chọn hình ảnh khác rỗng
	if($hinhanh!='')
	{
	// lay du lieu tu bang
		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		
		$sql_update = "update baivietuv set id_nganhnghe='$nganhnghe',tenungvien='$tenungvien',luong='$luong',id_diadiem='$diadiem', tenbaiviet='$tenbaiviet',mota='$mota',hinhanh='$hinhanh',ngaydang='$ngaydang',tinhtrang='$tinhtrang'
		 where id_baiviet='$_GET[id_baiviet]' ";
		 //xoa anh cu
	$sql="select *from baivietuv where id_baiviet='$_GET[id_baiviet]' limit 1";
	 $query=mysqli_query($mysqli,$sql);
	 while($row=mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
	}
}
else{
	$sql_update = "update baivietuv set id_nganhnghe='$nganhnghe',tenungvien='$tenungvien',luong='$luong',id_diadiem='$diadiem', tenbaiviet='$tenbaiviet',mota='$mota',ngaydang='$ngaydang',tinhtrang='$tinhtrang'
		 where id_baiviet='$_GET[id_baiviet]' ";
}
// ket noi csdl
		mysqli_query($mysqli,$sql_update);
		header('location:../../index.php?action=qlbvuv&query=them');
}
// xóa
else{
	 $id=$_GET['id_baiviet'];
	$sql="select *from baivietuv where id_baiviet='$id' limit 1";
	 $result=mysqli_query($mysqli,$sql);
	 while($row=mysqli_fetch_array($result)){
		unlink('uploads/'.$row['hinhanh']);
	}
	// $id=$_GET['id_sp'];
	 $sql_xoa = "delete from baivietuv where id_baiviet='$id'";
	 	 mysqli_query($mysqli,$sql_xoa);
		header('location:../../index.php?action=qlbvuv&query=them');
}

?>
