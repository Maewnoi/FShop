
    <div class="row">
    <div class="col-md-6">
      <br>
      <a href="index.php?page=typeJob_form_add" class="btn-info btn-lg">เพิ่ม </a>
      <hr>
      <?php
 if($_GET['search'] != NULL){
  $query = "SELECT * FROM typeJob 
   WHERE `tj_name` LIKE '%".$_GET['search']."%'
   ORDER BY tj_id ASC";
  }else{
  $query = "SELECT * FROM typeJob ORDER BY tj_id ASC";
                
  }
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>รหัส</td>
                      <td>ประเภทงานที่รับ</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>                 
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["tj_id"] .  "</td> ";
                    echo "<td>" .$row["tj_name"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='index.php?page=typeJob_form_edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                    //ลบข้อมูล
                    echo "<td><a href='typeJob_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>

    </div>
    </div>
