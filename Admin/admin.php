<?php 
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

?>
<div class="row">
    <div class="col-md-6"> 
      <br> <a href="index.php?page=admin_form_add" class="btn-info btn-lg">เพิ่ม </a> <hr>
      <?php
                
                if($_GET['search'] != NULL){
                  
                $query = "SELECT * FROM tbl_admin 
                 WHERE (`a_name` LIKE '%".$_GET['search']."%' OR `a_user` LIKE '%".$_GET['search']."%' OR `a_address` LIKE '%".$_GET['search']."%')
                 ORDER BY a_id ASC";
                }else{
                $query = "SELECT * FROM tbl_admin ORDER BY a_id ASC";
                
                }
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr bgcolor='#AED6F1' >
                      <td>id</td>
                      <td>ชื่อรหัส</td>
                      <td>รหัสผ่าน</td>
                      <td>ชื่อ</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["a_id"] .  "</td> ";
                    echo "<td>" .$row["a_user"] .  "</td> ";
                    echo "<td>******</td> ";
                    echo "<td>" .$row["a_name"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='index.php?page=admin_form_edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
                    
                    //ลบข้อมูล
                    echo "<td><a href='admin_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>
    </div>
</div>
