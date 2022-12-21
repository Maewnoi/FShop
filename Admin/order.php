
<?php
  include('../h.php');
  include('../condb.php');
  error_reporting( error_reporting() & ~E_NOTICE );
?>
    <div class="row">
    <div class="col-md-9">
      <br>
      <a href="index.php?page=order_form_add" class="btn-info btn-lg">เพิ่ม </a>
      <hr>
      <?php
      if($_GET['search'] != NULL){
 
        $query = "SELECT *  FROM tbl_staple 
        
        WHERE `st_list` LIKE '%".$_GET['search']."%'
        ORDER BY st_id ASC";
        }else{
         $query = "SELECT * FROM tbl_staple ORDER BY st_id ASC";
                                                                
        }
                $query = "SELECT * FROM tbl_staple ORDER BY st_id ASC";
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>ลำดับ</td>
                      <td>รายการ</td>
                      <td>ราคา</td>
                      <td>สถานะ</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>                 
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["st_id"] .  "</td> ";
                    echo "<td>" .$row["st_list"] .  "</td> ";
                    echo "<td>" .$row["st_price"] .  "</td> ";
                    echo "<td>" .$row["st_qty"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='staple.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                    //ลบข้อมูล
                    echo "<td><a href='staple_edit_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>