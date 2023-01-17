<?php  

//  so sánh id_dm của bảng sp vs id_dm của bảng danhmuc
    $sql_lietkebv=" SELECT * FROM baivietvl, nganhnghe, diadiem
     WHERE baivietvl.id_nganhnghe = nganhnghe.id_nganhnghe 
     AND baivietvl.id_diadiem = diadiem.id_diadiem ORDER BY id_baiviet ASC ";
  //  $sql_lietkesp="select * from sanpham order by id_sp asc ";
    
    $result= mysqli_query($mysqli,$sql_lietkebv) ;
?>
<p>Liệt kê bài viết việc làm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Ngành nghề</th>
    <th>Tên việc làm</th>
    <th>Lương</th>
    <th>Địa điểm</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Ngày đăng</th> 
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
    <td><?php echo $row['tennganhnghe'] ?></td>
    <td><?php echo $row['tenvieclam'] ?></td>
    <td><?php echo $row['luong'] ?></td>
    <td><?php echo $row['tendiadiem'] ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/qlbvvl/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['ngaydang'] ?></td>
    
    <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
    }else{
        echo 'Ẩn';
    }
      ?>
    </td>

    <td>
         <a href="modules/qlbvvl/xuly.php?&id_baiviet=<?php echo $row['id_baiviet']?>">Xóa</a>| 
         <a href="?action=qlbvvl&query=sua&id_baiviet=<?php echo $row['id_baiviet']?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
   }

?>
</table>