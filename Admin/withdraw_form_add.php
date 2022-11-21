<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_withdraw:
$query = "SELECT * FROM tbl_withdraw ORDER BY wd_id asc";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:

$query2 = "SELECT * FROM tbl_type ORDER BY type_id asc";
$result2 = mysqli_query($con, $query2);
?>
<div class="container">
  <br>
      <form  name="add" action="expenses_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <div class="form-group row">
        <div class="col-sm-2 control-label"> รายการ : </div>
        <div class="col-sm-3">
            <select name="p_id" class="form-control" required>
                  <option value="">เลือกรายการสินค้า</option>
                  <?php foreach($result2 as $results){?>
                  <option value="<?php echo $results["type_id"];?>">
                    <?php echo $results["type_name"]; ?>
                  </option>
                  <?php } ?>
            </select>
        </div>
      </div>
        <div class="form-group row">
        <div class="col-sm-2 control-label"> จำนวน : </div>
          <div class="col-sm-9">
            <p>จำนวน</p>
            <input type="text"  name="wd_quantity" class="form-control"  />
          </div>
        </div>
      
       <div class="form-group row">
        <div class="col-sm-2 control-label"> วัน/เดือน/ปี : </div>
          <div class="col-sm-9">
            <p>วัน/เดือน/ปี</p>
            <input type="datetime-local"  name="wd_time" class="form-control"  />
          </div>
        </div> 
        <div class="form-group row">
          <div class="col-sm-12">
            <p> รายละเอียดการเบิกวัตถุดิบ </p>
            <textarea  name="wd_note" rows="5" cols="60"></textarea>
          </div>
        </div>
            
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
  </div>