<?php 
 if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=product.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=product.php" />';
  }

$query = "SELECT * FROM tbl_product as p
INNER JOIN tbl_type as t ON p.type_id = t.type_id
ORDER BY p.p_id DESC";
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='3%'  class='hidden-xs'>ID</th>
      <th width='20%' class='hidden-xs'>รูป</th>
       <th width='15%'>ชื่อสินค้า</th>
       <th width='20%' class='hidden-xs'>รายละเอียดสินค้า</th>
      <th width='15%'>ราคาสินค้า</th>
      <th width='5%'>แก้ไข</th>
      <th width=5%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td  class='hidden-xs'>" .$row["p_id"] .  "</td> ";
    echo "<td class='hidden-xs'>".$row['p_img']."<img src='./p_img/".$row['p_img']."' width='100%'>"."</td>";
    echo "<td> ชื่อ: " .$row["p_name"] .
    "<br>ประเภท: <font color='blue'>".$row["type_name"] ."</font>".
      "</td class='hidden-xs'> ";
    echo "<td class='hidden-xs'>" .$row["p_detail"] ."</td> ";
       echo "<td> ราคา " .$row["p_price"] ." บาท".    "<br>จำนวน ".$row["p_qty"]." ".$row["p_unit"].
      "</td> ";
      "</td> ";
       
  
                      //แก้ไขข้อมูล
                      echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                      //ลบข้อมูล
                      echo "<td><a href='product_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                    echo "</tr>";
                    }
                  echo "</table>";
echo "</table>";
mysqli_close($con);
?>