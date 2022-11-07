<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_buy ORDER BY b_id asc" ;
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
      <form  name="addBuy" action="Buy_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p> รายการวัตถุดิบ</p>
            <input type="text"  name="b_list" class="form-control" />
          </div>
        </div></br>
        <div class="form-group">
          <div class="col-sm-8">
            <p> ประเภทสินค้า </p>
            <select name="type_id" class="form-control" required>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div></br>
        <div class="form-group">
          <div class="col-sm-9">
            <p> ราคา</p>
            <input type="text"  name="b_price" class="form-control"/>
          </div>
        </div></br>
        <div class="form-group">
          <div class="col-sm-9">
            <p>จำนวน</p>
            <input type="text"  name="b_QTY" class="form-control"/>
          </div>
        </div></br>
        
        <div class="form-check">
        <p> สถานะ</p>
  <input class="form-check-input" type="radio" name="b_status" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    ชำระแล้ว
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="b_status" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    ยังไม่ชำระ
  </label>
</div></br>

        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>