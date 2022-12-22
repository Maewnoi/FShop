
<?php
  include('../h.php');
  include('../condb.php');
  error_reporting( error_reporting() & ~E_NOTICE );
?>
<div class="row">
    <div class="col-md-9">
      <br>
      <a href="index.php?page=Buy_form_add" class="btn-info btn-lg">สั่งซื้อวัตถุดิบ</a>

      <hr>
<?php

if($_GET['search'] != NULL){
 
  $query = "SELECT *  FROM tbl_buy 
  
  WHERE `buy_recorder` LIKE '%".$_GET['search']."%'
  ORDER BY buy_id ASC";
  }else{
 $query = "SELECT *  FROM tbl_buy ORDER BY buy_id ASC";
                                             
  }
  $i=1;
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
    $result = mysqli_query($con, $query);
    //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
    echo ' <table class="table table-hover">';
      //หัวข้อตาราง 
      echo "
            <p>ตารางสั่งซื้อวัตถุดิบ</p>
            <tr>
            <td>รหัส</td>
            <td>รายการวัตถุดิบ / จำนวนที่สั่งซื้อ / ราคาต่อหน่วย</td>
            <td>ราคารวม</td>
            <td>สถานะ</td>
            <td>แก้ไข</td>
            <td>ลบ</td>                 
          </tr>";
      
                  while($row = mysqli_fetch_array($result)) {
                      if($row["b_status"] == 'Y'){$text = 'ชำระแล้ว';}
                      else{$text = 'ยังไม่ชำระ';}


                  echo "<tr>";
                    echo "<td>" .$i.  "</td> ";
                    echo "<td>";
                    $query_product = "SELECT * FROM `tbl_buylist`,tbl_stock WHERE tbl_buylist.b_st_id = tbl_stock.st_id AND tbl_buylist.b_buy_id = '".$row["buy_id"]."' ";
                    $result_pro =mysqli_query($con, $query_product) ;
                    foreach ($result_pro as $row_pro) {

                      if($row_pro["b_received"] == 'Y'){$text2 = 'รับแล้ว';}
                      else{$text2 = 'ยังไม่รับ';}
                      echo $row_pro['st_name'].' จำนวน '.$row_pro['b_QTY'].' ราคา  '.$row_pro['b_price'].' บาท '.$text2.'<br>';
                    }
                    echo "</td> ";
                    echo "<td>" .$row["buy_price"] .  "</td> ";
                    echo "<td>" .$text."</td> ";

                    //แก้ไขข้อมูล
                    echo "<td><a href='index.php?page=Buy_form_edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                    //ลบข้อมูล
                    echo "<td><a href='buy_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  $i++;}
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>
