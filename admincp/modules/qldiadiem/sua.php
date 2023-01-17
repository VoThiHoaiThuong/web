<?php
    $sql_suadm="select * from diadiem where id_diadiem='$_GET[id_diadiem]' limit 1 ";
    //limit sửa giới hank 1 sản phẩm
    $query_suadm= mysqli_query($mysqli,$sql_suadm);
?>
<p>Sửa địa điểm</p>
<!-- dữ liệu được lấy phụ thuộc vào thuộc tính name và text -->
<table border="1" width="50%"  style="border-collapse: collapse;">
  <!-- Gửi dữ liệu  -->
<form method="POST" action="modules/qldiadiem/xuly.php?id_diadiem=<?php echo $_GET['id_diadiem'] ?>">
    <!-- mang them id để biết danh muc xử lí -->
<?php
// lấy ra từng mảng
while($dong= mysqli_fetch_array($query_suadm)){
    
?>
  <tr>
    <td>Tên địa điểm</td>
    <td><input type="text" value="<?php echo $dong['tendiadiem']?>" name="tendiadiem"></td>
  </tr>
  
  <tr>
    <td colspan="2"><input type="submit" name="suadm" value="Sửa địa điểm"> </td>
  </tr>
  <?php
    }
  ?>
  </form>
</table>

