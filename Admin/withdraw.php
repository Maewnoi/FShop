<?php
  include('../h.php');
  include('../condb.php');
  error_reporting( error_reporting() & ~E_NOTICE );
?>
<div class="row">
    <div class="col-md-9">
      <br>
      <a href="index.php?page=withdraw_form_add" class="btn-info btn-lg">เบิกวัตถุดิบ</a>

      <hr>
      <?php
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_withdraw ORDER BY wd_id ASC";
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr bgcolor='#AED6F1' >
                      <td>ลำดับ</td>
                      <td>รายการ</td>
                      <td>จำนวนที่เบิก</td>
                      <td>ว/ด/ป</td>
                      <td>รายละเอียด</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>
                    </tr>";
                $i = 1;
                  while($row = mysqli_fetch_array($result)) 
                  {
                  echo "<tr>";
                    echo "<td>" .$i.  "</td> ";
                    echo "<td>" .$row["wd_list"].  "</td> ";
                    echo "<td>" .$row["wd_QTY"].  "</td> ";
                    echo "<td>" .$row["wd_time"].  "</td> ";
                    echo "<td>" .$row["wd_note"].  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='index.php?page=withdraw_form_edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
                    
                    //ลบข้อมูล
                    echo "<td><a href='withdraw_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                 $i++; }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>