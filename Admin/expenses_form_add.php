<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_expenses ORDER BY e_id asc";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
      <form  name="add" action="expenses_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อรายจ่าย</p>
            <input type="text"  name="e_list" class="form-control" required placeholder="ชื่อรายจ่าย" />
          </div>
        </div>
        
        <div class="container">
  <div class="row">

        <div class="form-group">
          <div class="col-sm-9">
            <p>วัน/เดือน/ปี</p>
            <input type="datetime-local"  name="e_time" class="form-control"  />
          </div>
        </div>

        <div class="container">
  <div class="row">
    
        <div class="form-group">
          <div class="col-sm-9">
            <p>จำนวน</p>
            <input type="text"  name="e_pay" class="form-control" required placeholder="จำนวน" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดรายจ่าย </p>
             <textarea  name="e_note" rows="5" cols="60"></textarea>
          </div>
        </div>
        <div class="form-group">
          
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>