<?php  

//  so sánh id_dm của bảng sp vs id_dm của bảng danhmuc
    $sql_lietkebv=" SELECT * FROM baivietct, nganhnghe, diadiem
     WHERE baivietct.id_nganhnghe = nganhnghe.id_nganhnghe 
     AND baivietct.id_diadiem = diadiem.id_diadiem ORDER BY id_baiviet ASC ";
  //  $sql_lietkesp="select * from sanpham order by id_sp asc ";
    
    $result= mysqli_query($mysqli,$sql_lietkebv) ;
?>
<p>Liệt kê bài viết việc làm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Tên công ty</th>
    <th>Ngành nghề</th>
    <th>Địa điểm</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Quy mô</th>
    <th>Thành lập</th>
    <th>Email</th>
    <th>SĐT</th> 
    <th>Tình trạng</th>
    <th>Quản lí</th>
</tr>
<?php
$i=0;
// lấy ra từng mảng

if ($result) {
	
	while($row = mysqli_fetch_array($result)){
    $i++;
  		
	?>

  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tencongty'] ?></td>
    <td><?php echo $row['tennganhnghe'] ?></td>
    <td><?php echo $row['tendiadiem'] ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/qlbvct/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['quymo'] ?></td>
    <td><?php echo $row['thanhlap'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['sdt'] ?></td>
  
    
    <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
    }else{
        echo 'Ẩn';
    }
      ?>
    </td>

    <td>
         <a href="modules/qlbvct/xuly.php?&id_baiviet=<?php echo $row['id_baiviet']?>">Xóa</a>| 
         <a href="?action=qlbvct&query=sua&id_baiviet=<?php echo $row['id_baiviet']?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
   }

?>
</table>