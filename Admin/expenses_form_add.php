<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_expenses ORDER BY e_id asc";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<br>
<div class="container">
      <form  name="add" action="expenses_form_add_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group row">
          <div class="col-sm-2">รายจ่าย</div>
          <div class="col-sm-6">
            <input type="text"  name="e_list" class="form-control" required placeholder="รายจ่าย" />
          </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-sm-2">วัน/เดือน/ปี</div>
          <div class="col-sm-3">
            <input type="datetime-local"  name="e_time" class="form-control"  />
          </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-sm-2">จำนวน</div>
          <div class="col-sm-3">
            <input type="text"  name="e_pay" class="form-control" required placeholder="จำนวน" />
          </div>
        </div>
        <br>
        <div class="form-group row">
          <div class="col-sm-2">รายละเอียดรายจ่าย</div>
          <div class="col-sm-4">
             <textarea  name="e_note" rows="5" cols="60"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
  </div>