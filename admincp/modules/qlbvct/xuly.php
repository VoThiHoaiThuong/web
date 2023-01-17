<?php
// goi file tuong tac voi csdl
include('../../config/config.php');

$tencongty =$_POST['tencongty'];	
$nganhnghe =$_POST['nganhnghe'];
$diadiem =$_POST['diadiem'];
$tenbaiviet =$_POST['tenbaiviet'];
$mota =$_POST['mota'];

$noidung =$_POST['noidung'];
// xử lí hình ảnh
$hinhanh =$_FILES['hinhanh']['name'];
$hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];

$quymo =$_POST['quymo'];
$thanhlap =$_POST['thanhlap'];
$email =$_POST['email'];
$sdt =$_POST['sdt'];
$tinhtrang =$_POST['tinhtrang'];


// tmp_name biến tạm của hình ảnh

//  thêm
	if(isset($_POST['thembv'])){
		 // lay du lieu tu bang
		 $sql_them = "insert into baivietct(tencongty,id_nganhnghe,id_diadiem,tenbaiviet,mota,noidung,hinhanh,quymo,thanhlap,email,sdt,tinhtrang) 
		 VALUE('$tencongty','$nganhnghe','$diadiem','$tenbaiviet','$mota','$noidung','$hinhanh','$quymo','$thanhlap','$email','$sdt','$tinhtrang') ";
		 // ket noi csdl
		 mysqli_query($mysqli,$sql_them);
		 //phải upload hình ảnh
		 move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		 header('location:../../index.php?action=qlbvct&query=them');
}
//Sửa
elseif(isset($_POST['suabv'])){
	//có chọn hình ảnh khác rỗng
	if($hinhanh!='')
	{
	// lay du lieu tu bang
		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		
		$sql_update = "update baivietct set tencongty='$tencongty',id_nganhnghe='$nganhnghe',id_diadiem='$diadiem', tenbaiviet='$tenbaiviet',mota='$mota',noidung='$noidung',hinhanh='$hinhanh',quymo='$quymo',thanhlap='$thanhlap',email='$email',sdt='$sdt',tinhtrang='$tinhtrang'
		 where id_baiviet='$_GET[id_baiviet]' ";
		 //xoa anh cu
	$sql="select *from baivietct where id_baiviet='$_GET[id_baiviet]' limit 1";
	 $query=mysqli_query($mysqli,$sql);
	 while($row=mysqli_fetch_array($query)){
	unlink('uploads/'.$row['hinhanh']);
	}
}
else{
	$sql_update = "update baivietct set tencongty='$tencongty',id_nganhnghe='$nganhnghe',id_diadiem='$diadiem', tenbaiviet='$tenbaiviet',mota='$mota',noidung='$noidung',quymo='$quymo',thanhlap='$thanhlap',email='$email',sdt='$sdt',tinhtrang='$tinhtrang'
		 where id_baiviet='$_GET[id_baiviet]' ";
}
// ket noi csdl
		mysqli_query($mysqli,$sql_update);
		header('location:../../index.php?action=qlbvct&query=them');
}
// xóa
else{
	 $id=$_GET['id_baiviet'];
	$sql="select *from baivietct where id_baiviet='$id' limit 1";
	 $result=mysqli_query($mysqli,$sql);
	 while($row=mysqli_fetch_array($result)){
		unlink('uploads/'.$row['hinhanh']);
	}
	// $id=$_GET['id_sp'];
	 $sql_xoa = "delete from baivietct where id_baiviet='$id'";
	 	 mysqli_query($mysqli,$sql_xoa);
		header('location:../../index.php?action=qlbvct&query=them');
}

?>
