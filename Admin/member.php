
<?php
  include('../h.php');
  include('../condb.php');
  error_reporting( error_reporting() & ~E_NOTICE );
?>
    <div class="row">
    <div class="col-md-9">
      <br>
      <a href="index.php?page=member_form_add" class="btn-info btn-lg">เพิ่มข้อมูลสมาชิก </a>
      <hr>
  <?php
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_member ORDER BY member_id ASC";
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>ลำดับ</td>
                      <td>รหัสลงทะเบียน</td>
                      <td>รหัสผ่าน</td>
                      <td>ชื่อ</td>
                      <td>อีเมล</td>
                      <td>ที่อยู่</td>
                      <td>แก้ไข</td>
                      <td>ลบ</td>                 
                    </tr>";
                    
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["member_id"] .  "</td> ";
                    echo "<td>" .$row["m_user"] .  "</td> ";
                    echo "<td>" .$row["m_pass"] .  "</td> ";
                    echo "<td>" .$row["m_name"] .  "</td> ";
                    echo "<td>" .$row["m_email"] .  "</td> ";
                    echo "<td>" .$row["m_address"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='index.php?page=member_form_edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                    //ลบข้อมูล
                    echo "<td><a href='member_edit_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>
    </div>
    </div>
