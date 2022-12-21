<?php
  include('../h.php');
  include('../condb.php');
  error_reporting( error_reporting() & ~E_NOTICE );
?>
<div class="row">
    <div class="col-md-9">
      <br>
      <a href="index.php?page=expenses_form_add" class="btn-info btn-lg">บันทึกรายจ่าย</a>

      <hr>
      <?php
      if($_GET['search'] != NULL){
 
        $query = "SELECT *  FROM tbl_expenses 
        
        WHERE (`e_list` LIKE '%".$_GET['search']."%' OR
        `e_note` LIKE '%".$_GET['search']."%')
        ORDER BY e_id ASC";
        }else{
         $query = "SELECT * FROM tbl_expenses ORDER BY e_id ASC";
                                                                
        }
        $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr bgcolor='#AED6F1' >
                      <td>รหัส</td>
                      <td>รายการ</td>
                      <td>ว/ด/ป</td>
                      <td>จำนวน</td>
                      <td>หมายเหตุ</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>
                    </tr>";
                $i = 1;
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$i.  "</td> ";
                    echo "<td>" .$row["e_list"] .  "</td> ";
                    echo "<td>" .$row["e_time"] .  "</td> ";
                    echo "<td>" .$row["e_pay"] .  "</td> ";
                    echo "<td>" .$row["e_note"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='index.php?page=expenses_form_edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
                    
                    //ลบข้อมูล
                    echo "<td><a href='expenses_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                 $i++; }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>