<?php
    $sql_suabv="select * from baivietct where id_baiviet='$_GET[id_baiviet]' limit 1 ";
    //limit sửa giới hạn  1 sản phẩm
    $query_suabv= mysqli_query($mysqli,$sql_suabv);
?>
<p>Sửa bài viết công ty<p>
<!-- dữ liệu được lấy phụ thuộc vào thuộc tính name và text -->
<table border="1" width="100%"  style="border-collapse: collapse;">
  <!-- Gửi dữ liệu  -->
  <?php
  while($row = mysqli_fetch_array($query_suabv)){
  ?>
  <!-- enctype="multipart/form-data để gửi file qua form bằng pt post -->
<form method="POST" action="modules/qlbvct/xuly.php?id_baiviet=<?php echo $row['id_baiviet'] ?>"  enctype="multipart/form-data" >

<tr>
    <td>Tên công ty</td>
    <td><input type="text" value="<?php echo $row['tencongty'] ?>" name="tencongty"></td>
  </tr>
    

<tr>
    <td>Ngành nghề</td>
    <td>
      <select name ="nganhnghe">
      <?php
      $sql_nn="select *from nganhnghe order by id_nganhnghe asc";
      $query_nn=mysqli_query($mysqli,$sql_nn);
      while($row_nn=mysqli_fetch_array($query_nn)){
        //khi click vao sua 1 sp chi tuong ung vs 1 sp do chua id_dm so sanh id cua sp do voi vong lap
        if($row_nn['id_nganhnghe']==$row['id_nganhnghe']){
      ?>
      <option selected value="<?php echo $row_nn['id_nganhnghe'] ?>"><?php echo $row_nn['tennganhnghe'] ?></option>
      <?php
      }
      else{
      ?>
       <option value="<?php echo $row_nn['id_nganhnghe'] ?>"><?php echo $row_nn['tennganhnghe'] ?></option>
       <?php
      }
      }
       ?>
      </select>
    </td>
  </tr> 


  <tr>
    <td>Địa điểm</td>
    <td>
      <select name ="diadiem">
      <?php
      $sql_dd="select *from diadiem order by id_diadiem asc";
      $query_dd=mysqli_query($mysqli,$sql_dd);
      while($row_dd=mysqli_fetch_array($query_dd)){
        //khi click vao sua 1 sp chi tuong ung vs 1 sp do chua id_dm so sanh id cua sp do voi vong lap
        if($row_dd['id_diadiem']==$row['id_diadiem']){
      ?>
      <option selected value="<?php echo $row_dd['id_diadiem'] ?>"><?php echo $row_dd['tendiadiem'] ?></option>
      <?php
      }
      else{
      ?>
       <option value="<?php echo $row_dd['id_diadiem'] ?>"><?php echo $row_dd['tendiadiem'] ?></option>
       <?php
      }
      }
       ?>
      </select>
    </td>
  </tr>

<tr>
    <td>Tên bài viết </td>
    <td><input type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet"></td>
  </tr>
  
  <tr>
    <td>Mô tả</td>
    <td><textarea name="mota" rows="10" style="resize:none"><?php echo $row['mota'] ?></textarea></td>
    <!-- style="resize: none; không được phép kéo -->
  </tr>

  <tr>
    <td>Nội dung</td>
    <td><textarea name="noidung" rows="10" style="resize:none"><?php echo $row['noidung'] ?></textarea></td>
    <!-- style="resize: none; không được phép kéo -->
  </tr>
  
  <tr>
    <td>Hình ảnh</td>
    <td>
      <input type="file" name="hinhanh">
      <img src="modules/qlbvct/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
  </td>
  </tr>
  
  <tr>
    <td> Quy mô </td>
    <td><input type="text" value="<?php echo $row['quymo'] ?>" name="quymo"></td>
  </tr>
  
  <tr>
    <td> Thành lập </td>
    <td><input type="text" value="<?php echo $row['thanhlap'] ?>" name="thanhlap"></td>
  </tr>
  
  <tr>
    <td> Email </td>
    <td><input type="text" value="<?php echo $row['email'] ?>" name="email"></td>
  </tr>
    
  <tr>
    <td> SĐT </td>
    <td><input type="text" value="<?php echo $row['sdt'] ?>" name="sdt"></td>
  </tr>

  <tr>
      <td>Tình trạng</td>
      <td>
          <select name="tinhtrang">
            <?php
            if($row['tinhtrang']==1){
            ?>
            <option value="1" selected>Kích hoạt</option>
            <option value="0">Ẩn</option>
            <?php
            }else{
            ?>
            <option value="1">Kích hoạt</option>
            <option value="0" selected>Ẩn</option>
            <?php
            }
            ?>
          </select>
      </td>
  </tr>
  
  <tr>
    <td colspan="2"><input type="submit" name="suabv" value=" Sửa bài viết"> </td>
  </tr>
  </form>
  <?php
  }
  ?>
</table>



