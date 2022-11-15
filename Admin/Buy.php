
<?php
  include('../h.php');
  include('../condb.php');
  error_reporting( error_reporting() & ~E_NOTICE );
?>
<div class="row">
    <div class="col-md-9">
      <br>
      <a href="index.php?page=Buy_form_add" class="btn-info btn-lg">เพิ่ม </a>

      <hr>
<?php

//2. query ข้อมูลจากตาราง tb_Buy:
                $query = "SELECT *  FROM tbl_buy ORDER BY b_id ASC";
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                 
                    echo "
                     <p>ตารางสั่งซื้อวัตถุดิบ</p>
                      <tr>
                      <td>รหัส</td>
                      <td>รายการวัตถุดิบ</td>
                      <td>ปรเภทสินค้า</td>
                      <td>จำนวนสินค้า</td>
                      <td>ราคาสินค้า</td>
                      <td>สถานะสินค้า</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>                 
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                      if($row["b_status"] == 'Y'){$text = 'ชำระแล้ว';}
                      else{$text = 'ยังไม่ชำระ';}


                  echo "<tr>";
                    echo "<td>" .$row["b_id"] .  "</td> ";
                    echo "<td>" .$row["b_list"] .  "</td> ";
                    echo "<td>" .$row["type_id"] .  "</td> ";
                    echo "<td>" .$row["b_QTY"] .  "</td> ";
                    echo "<td>" .$row["b_price"] .  "</td> ";
                    echo "<td>" .$text.  "</td> ";

                    //แก้ไขข้อมูล
                    echo "<td><a href='index.php?page=Buy_form_edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                    //ลบข้อมูล
                    echo "<td><a href='buy_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>
