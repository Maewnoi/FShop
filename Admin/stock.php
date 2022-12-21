<?php
  include('../h.php');
  include('../condb.php');
  error_reporting( error_reporting() & ~E_NOTICE );
?>
<div class="row">
    <div class="col-md-9">
      <br>
      <form  name="add" action="stock_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <div class="form-group row">
        <div class="col-sm-1 control-label"> รายการ : </div>
        <div class="col-sm-4">
            <input type="text"  name="st_name" class="form-control"  />
        </div>
        <div class="col-sm-1 control-label"> จำนวน : </div>
        <div class="col-sm-2">
            <input type="number"  name="st_QTY" class="form-control"  />
         </div>
        <div class="col-sm-2"><button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button></div>
        </div>
        
        
            
          </div>
        </div>
      </form>

      <hr>
      <?php
 if($_GET['search'] != NULL){
  $query = "SELECT * FROM tbl_stock
  
  WHERE `st_name` LIKE '%".$_GET['search']."%'
  ORDER BY `tbl_stock`.`st_name` ASC";
  }else{
  $query = "SELECT * FROM tbl_stock ORDER BY `tbl_stock`.`st_name` ASC";
                              
  }
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr bgcolor='#AED6F1' >
                      <td>ลำดับ</td>
                      <td>รายการ</td>
                      <td>จำนวน</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>
                    </tr>";
                    $i = 1;
                  while($row = mysqli_fetch_array($result)) 
                  {
                  echo "<tr>";
                    echo "<td>" .$i.  "</td> ";
                    echo "<td>" .$row["st_name"] .  "</td> ";
                    echo "<td>" .$row["st_QTY"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='index.php?page=stock_form_edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
                    
                    //ลบข้อมูล
                    echo "<td><a href='withdraw_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                 $i++; }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>