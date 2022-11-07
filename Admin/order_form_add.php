<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_order ORDER BY o_id asc";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
      <form  name="add" action="expenses_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-6">
            <p>รายการ</p>
            <input type="text"  name="p_id" class="form-control"  />
          </div>
        </div>
        <div class="container">
  <div class="row">
    
        <div class="form-group">
          <div class="col-sm-9">
            <p>ราคา</p>
            <input type="text"  name="e_price" class="form-control" />
          </div>
        </div>
       <div class="form-group">
          <div class="col-sm-9">
            <p>วัน/เดือน/ปี</p>
            <input type="datetime-local"  name="o_time" class="form-control"  />
          </div>
        </div> 

        <div class="container">
  <div class="row">

        <div class="form-group">
          <div class="col-sm-9">
            <p>จำนวน</p>
            <input type="text"  name="e_pay" class="form-control"  />
          </div>
        </div>
      <form  name="add" action="expenses_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p>รายชื่อลูกค้า</p>
            <input type="text"  name="c_id" class="form-control"  />
          </div>
        </div>

        
        <div class="container">
  <div class="row">
        
        
        <div class="form-group">
        <div class="form-group">
          
        <div class="col-sm-12">
            <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดการจัดส่ง </p>
            <textarea  name="o_staus" rows="5" cols="60"></textarea>
          </div>
        </div>
            
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>