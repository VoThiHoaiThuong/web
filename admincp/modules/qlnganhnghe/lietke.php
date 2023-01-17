<?php
    $sql_lietkenn="select * from nganhnghe order by id_nganhnghe asc ";
    $query_lietkenn= mysqli_query($mysqli,$sql_lietkenn);
?>
<p>Liệt kê ngành nghề</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Tên địa điểm</th>
    <th>Quản lí</th>
</tr>
<?php
$i=0;
// lấy ra từng mảng
while($row= mysqli_fetch_array($query_lietkenn)){
    $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tennganhnghe'] ?></td>
    <td>
         <a href="modules/qlnganhnghe/xuly.php?&id_nganhnghe=<?php echo $row['id_nganhnghe']?>">Xóa</a>| 
         <a href="?action=qlnganhnghe&query=sua&id_nganhnghe=<?php echo $row['id_nganhnghe']?>">Sửa</a>
    </td>
  </tr>
  <?php
}
?>
</table>