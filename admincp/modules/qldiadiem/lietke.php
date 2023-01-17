<?php
    $sql_lietkedm="select * from diadiem order by id_diadiem asc ";
    $query_lietkedm= mysqli_query($mysqli,$sql_lietkedm);
?>
<p>Liệt kê địa điểm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Tên địa điểm</th>
    <th>Quản lí</th>
</tr>
<?php
$i=0;
// lấy ra từng mảng
while($row= mysqli_fetch_array($query_lietkedm)){
    $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendiadiem'] ?></td>
    <td>
         <a href="modules/qldiadiem/xuly.php?&id_diadiem=<?php echo $row['id_diadiem']?>">Xóa</a>| 
         <a href="?action=qldiadiem&query=sua&id_diadiem=<?php echo $row['id_diadiem']?>">Sửa</a>
    </td>
  </tr>
  <?php
}
?>
</table>